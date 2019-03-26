<?php

namespace App\Http\Controllers\Customer;

use App\DbcoCustomer;
use App\DbcoVersion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerSolutionsController extends Controller
{
    public function __construct()
		{
			$this->middleware('verified');
		}
	
	public function main()
		{		
			
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			$solutions = $dbco_customer->dbcoSolutions()->where('isolutiontype','1')->orderBy('dbco_install.dinstalldate', 'desc')->get();
			
			//$versions = DbcoVersion::get();
			
			//$versions = DbcoVersion::pluck('cversionname', 'iversionid'); // имена версий в массив
			$versions = DbcoVersion::pluck('cversion', 'iversionid');
			
			//dd($solutions);
			return view('dbco.customer.customersolutions.main', ['solutions' => $solutions, 'versions' => $versions]);
		}
}
