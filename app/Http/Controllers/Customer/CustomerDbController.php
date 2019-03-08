<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerDbController extends Controller
{
    public function main()
		{		
			return view('dbco.customer.customerdb.main');
		}
}
