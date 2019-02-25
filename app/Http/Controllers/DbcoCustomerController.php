<?php
	
	namespace App\Http\Controllers;
	
	use App\DbcoCustomer;
	use App\User;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class DbcoCustomerController extends Controller
	{
		
		public function __construct()
		{
			$this->middleware('verified');
		}
		
		public function main()
		{	
		    $id = Auth::id(); //id текущего пользователя
			$user = User::findOrFail($id);			
			
			$dbco_customer = DbcoCustomer::firstOrNew(['user_id' => $id]); //ищем или создаем кастомера для текущего пользователя
			$user->dbcoCustomers()->save($dbco_customer); // сохраняем его в базе вместе с отношением к текущему юзеру
			
			return view('dbco.customers.edit', ['id' => $id, 'ccustomername' => $dbco_customer->ccustomername, 'icustomerid' => $dbco_customer->icustomerid, 'dbco_customer' => $dbco_customer]);
		}
		
		public function update(Request $request)
		{			
			/* $request->validate([
				'ccustomername' => 'required',
			]); */
			
			$id = Auth::id(); //id текущего пользователя
			$user = User::find($id);
			$dbco_customer = $user->dbcoCustomers()->first();
			
			$dbco_customer->update($request->all());
			
			return redirect()->route('customer.main')
			->with('success','Ваши данные успешно изменены!');
			
		}
		
	}
