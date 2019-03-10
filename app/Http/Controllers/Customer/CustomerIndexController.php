<?php
	
	namespace App\Http\Controllers\Customer;
	
	use App\DbcoCustomer;
	use App\User;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Http\Controllers\MssqlExtController;
	
	class CustomerIndexController extends Controller
	{
		
		public function __construct()
		{
			$this->middleware('verified');
		}
		
		public function main()
		{	

			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			return view('dbco.customer.customerpersonalinfo.main', ['dbco_customer' => $dbco_customer]);
		}
		
		public function update(Request $request)
		{			
			/* $request->validate([
				'ccustomername' => 'required',
			]); */
			
			DbcoCustomer::getCurrentCustomer()->update($request->all());
			
			MssqlExtController::callMssqlProcedure('sp_update_customer'); // оповещаем внешний сервер
			
			return redirect()->route('customer.main')
			->with('success','Ваши персональные данные успешно изменены!');
			
		}
		
	}
