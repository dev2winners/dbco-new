<?php
	
	namespace App\Http\Controllers;
	
	use App\DbcoCustomer;
	use App\DbcoSolution;
	use Illuminate\Http\Request;
	use App\Http\Controllers\DbcoSolutionController;
	use Illuminate\Support\Facades\Auth;
	
	class RootController extends Controller
	{
		//
		public function index(DbcoSolutionController $dsc) {
			
			$solutions = DbcoSolution::take(4)->where('isolutiontype', 1)->get();
			//$dsc = new DbcoSolutionController;
			
			if (Auth::check())
			{
				$dbco_customer = DbcoCustomer::getCurrentCustomer();				
				
				foreach($solutions as $solution){	
					
					$buttonState[$solution->isolutionid] = $dsc->setButton($dsc->isSolutionRelated($solution, $dbco_customer));
					
				}
				} else {
			    foreach($solutions as $solution){
					$buttonState[$solution->isolutionid] = ['state' => 'secondary', 'text' => 'АВТОРИЗУЙТЕСЬ'];
				}
			}
			//dd($solutions4);
			
			return view('dbco.root',['solutions' => $solutions, 'buttonState' => $buttonState]);
			
		}
	}
