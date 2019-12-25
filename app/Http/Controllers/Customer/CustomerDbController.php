<?php
	
	namespace App\Http\Controllers\Customer;
	
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\DbcoCustomer;
	use App\DbcoBackup;
	
	class CustomerDbController extends Controller
	{
		
	    public function __construct()
		{
			$this->middleware('verified');
		}
		
		public function main()
		{		
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			$backups = $dbco_customer->dbcoBackup()->orderBy('dbackupdate', 'desc')->paginate(12); //пока закаментил таблицы пустые
			
			return view('dbco.customer.customerdb.main',['backups' => $backups, 'dbco_customer' => $dbco_customer]);
		}
		
		public function update(Request $request)
		{					
			
			DbcoCustomer::getCurrentCustomer()->update($request->all());
			
			return back()
			->with('success','Данные ваших баз успешно изменены!');
			
		}
		
		public function postupdate(Request $request)
		{					
			
			//echo 'success';
			
			$result = DbcoCustomer::getCurrentCustomer()->update($request->all());
			
			echo $result;
			//return back()
			//->with('success','Это POST! Данные ваших баз успешно изменены!');
			
		}
		
	}
