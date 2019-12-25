<?php
	
	namespace App\Http\Controllers\Customer;
	
	use App\DbcoCustomer;
    use App\Ticket;
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
		public function verify(){
$user=auth()->user();
		    if(request()->method()=='POST'){
		        if(request()->get('verify_code')!=auth()->user()->verify_code){

		            session()->flash('verify_code');
                }else{
$user->verify_code=0;
$user->save();
                    $dbco_customer = DbcoCustomer::getCurrentCustomer();
                    Ticket::create_notification($dbco_customer->icustomerid,501);

		            return redirect('/lk/customer');
                }

            } 

		    return view("dbco/customer/verify");
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
			
			// оповещаем внешний сервер
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
            Ticket::create_notification($dbco_customer->icustomerid,510);
			//MssqlExtController::callMssqlProcedure('sp_update_customer '.$dbco_customer->icustomerid); // оповещаем внешний сервер
			
			return redirect()->route('customer.main')
			->with('success','Ваши персональные данные успешно изменены!');
			
		}
		
	}
