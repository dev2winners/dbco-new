<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	
	class TestController extends Controller
	{
		//
		public function index() {
			
			return view('dbco.test');
			
		}
	}
