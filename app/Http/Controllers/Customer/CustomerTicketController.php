<?php
	
	namespace App\Http\Controllers\Customer;
	
	use App\User;
	use App\Ticket;
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
			//$tickets = DB::table('dbco_ticket')->orderBy('iticketid', 'desc')->paginate(4);
			
			$tickets = Ticket::orderBy('iticketid', 'desc')->paginate(4);
		
			return view('dbco.customer.customertickets.main', ['tickets' => $tickets]);
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
