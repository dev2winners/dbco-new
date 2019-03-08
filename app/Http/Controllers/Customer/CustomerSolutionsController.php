<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerSolutionsController extends Controller
{
    public function main()
		{		
			return view('dbco.customer.customersolutions.main');
		}
}
