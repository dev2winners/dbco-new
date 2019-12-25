<?php

namespace App\Http\Controllers\Customer;

use App\User;
use App\Ticket;
use App\DbcoTicketType;
use App\DbcoCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MssqlExtController;

class CustomerTicketController extends Controller
{

    public function __construct()
    {
        $this->middleware('verified');
    }

    public function main()
    {

        //$tickets = Ticket::orderBy('iticketid', 'desc')->paginate(4);

        $dbco_customer = DbcoCustomer::getCurrentCustomer();

        $tickets = $dbco_customer->dbcoTicket()->orderBy('iticketid', 'desc')->paginate(12);
        if (request()->wantsJson()) {
            $data['body'] = view('dbco.customer.customertickets.ticket_tr', ['tickets' => $tickets, 'dbco_customer' => $dbco_customer])->render();


            $data['page_hide'] = 0;
            if ($tickets->lastPage() <= $tickets->currentPage()) {
                $data['page_hide'] = 1;
            }
            return response()->json(
                array('body' => $data));

            }
        return view('dbco.customer.customertickets.main', ['tickets' => $tickets, 'dbco_customer' => $dbco_customer]);
    }

    public function store(Ticket $ticket, Request $request)
    {


        $this->validate($request, [
            'bticketfile' => 'max:1000|image',
            'ctickettext' => 'required', //для обработки номерных тикетов
        ]);

        $ticket = Ticket::create($request->all());

        //dd($ticket);

        /*******************/
        $file = $request->bticketfile; // идентификатор файла
        if ($file) {
            $filecontent = $file->openFile()->fread($file->getSize()); //содержимое файла
            $filename = $request->bticketfile->getClientOriginalName(); //имя файла
            $ticket->bticketfile = $filecontent;
            $ticket->cticketfilename = $filename;
        }
        /*******************/

        if ($ticket->itickettype) {
            $ticket->ctickettext = DbcoTicketType::where('itickettypeid', $ticket->itickettype)->first()->ctickettypetext;
        }

        if ($request->ibackupid) {
            $ticket->iticketobject = $request->ibackupid;
        }

        $dbco_customer = DbcoCustomer::getCurrentCustomer();

        $dbco_customer->dbcoTicket()->save($ticket); // сохраняем модель с отношением к юзеру

        // оповещаем внешний сервер
        MssqlExtController::callMssqlProcedure('sp_update_ticket ' . $ticket->iticketid); // оповещаем внешний сервер

        return redirect()->route('tickets.main')
            ->with('success', 'Ваш запрос в службу поддержки зарегистрирован!');
    }


    public function get_file($id)
    {
        $dbco_customer = DbcoCustomer::getCurrentCustomer();

        $tickets = $dbco_customer->dbcoTicket()->where('iticketid', $id)->firstOrFail();

        $file_contents = base64_decode($tickets->bticketfile);

        return response($tickets->bticketfile)
            ->header('Cache-Control', 'no-cache private')
            ->header('Content-Description', 'File Transfer')
            ->header('Content-Type', 'image/jpeg')
            ->header('Content-length', strlen($tickets->bticketfile))
            ->header('Content-Disposition', 'attachment; filename=' . $tickets->cticketfilename)
            ->header('Content-Transfer-Encoding', 'binary');
    }
}
