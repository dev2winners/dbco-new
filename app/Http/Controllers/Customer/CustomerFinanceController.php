<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerFinanceController extends Controller
{
    public function main()
		{		
			return view('dbco.customer.customerfinance.main');
		}
}
