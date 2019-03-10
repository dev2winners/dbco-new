<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DbcoResourceController extends Controller
{
    public function main()
    {
        return view('dbco.resources.main');
    }
}
