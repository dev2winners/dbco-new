<?php

namespace App\Http\Controllers\Customer;

use App\DbcoCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerFinanceController extends Controller
{
    
	public function __construct()
		{
			$this->middleware('verified');
		}
	
	public function main()
		{		
			
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			//$finances = $dbco_customer->dbcoFinance()->where('ifinancedeleted', '0')->get();
			$finances = $dbco_customer->dbcoFinance()->where('ifinancedeleted', '0')->orderBy('dfinancedate', 'desc')->paginate(12);
			
			return view('dbco.customer.customerfinance.main', ['finances' => $finances, 'dbco_customer' => $dbco_customer]);
		}
}
