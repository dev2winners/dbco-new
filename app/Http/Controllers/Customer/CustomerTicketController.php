<?php
	
	namespace App\Http\Controllers\Customer;
	
	use App\User;
	use App\Ticket;
	use App\DbcoCustomer;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use App\Http\Controllers\Controller;
	
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
			
			$tickets = $dbco_customer->dbcoTicket()->orderBy('iticketid', 'desc')->paginate(4);
		
			return view('dbco.customer.customertickets.main', ['tickets' => $tickets]);
		}
		
		public function store(Ticket $ticket, Request $request)
		{				
			
			$ticket = Ticket::create($request->all());
			
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			$dbco_customer->dbcoTicket()->save($ticket); // сохраняем модель с отношением к юзеру
			
			return redirect()->route('tickets.main')
			->with('success','Ваш запрос в службу поддержки зарегистрирован!');
		}
	}
