<?php
	
	namespace App\Http\Controllers;
	
	use App\DbcoSolution;
	use Illuminate\Http\Request;
	
	class RootController extends Controller
	{
		//
		public function index() {
			
			
			$solutions4 = DbcoSolution::take(4)->where('isolutiontype', 1)->get();
			
			//dd($solutions4);
			
			return view('dbco.root',['solutions4' => $solutions4]);
			
		}
	}
