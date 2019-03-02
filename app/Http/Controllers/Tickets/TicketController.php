<?php
	
	namespace App\Http\Controllers\Tickets;
	
	use App\User;
	use App\Ticket;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use App\Http\Controllers\Controller;
	
	class TicketController extends Controller
	{
		
		public function __construct()
		{
			$this->middleware('verified');
		}
		
		public function main()
		{		
			$tickets = DB::table('dbco_ticket')->orderBy('iticketid', 'desc')->paginate(4);
		
			return view('dbco.tickets.main', ['tickets' => $tickets]);
		}
		
		public function store(Ticket $ticket, Request $request)
		{				
			
			//dd($request->all());
			
			//$ticket->save($request->all());
			
			Ticket::create($request->all());
			
			return redirect()->route('tickets.main')
			->with('success','Ваш запрос в службу поддержки зарегистрирован!');
		}
	}
