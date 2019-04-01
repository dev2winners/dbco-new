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
			
			//$solutions = DbcoSolution::take(4)->where('isolutiontype', 1)->get();
			
			$solutions = DbcoSolution::where('isolutiontype', 1)->where('isolutiondeleted', 0)->get();
			
			//dd($solutions);
			
			$authors = [];
			
			if (Auth::check()) {
				$dbco_customer = DbcoCustomer::getCurrentCustomer();
			}
			
			foreach($solutions as $solution){
				if(isset($dbco_customer)){
					$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData($dsc->isSolutionRelated($solution, $dbco_customer));
					} else {				
					$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData('secondary');
				}
				
				$authors[$solution->isolutionid] = ($author = DbcoCustomer::where('icustomerid',$solution->isolutiondeveloper)->first()) ? $author->ccustomername : '';
			}
			
			
			/* if (Auth::check())
				{
				$dbco_customer = DbcoCustomer::getCurrentCustomer();				
				
				foreach($solutions as $solution){	
				
				$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData($dsc->isSolutionRelated($solution, $dbco_customer));
				
				}
				} else {
			    foreach($solutions as $solution){
				$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData('secondary');
				}
			} */
			
			return view('dbco.root',['solutions' => $solutions, 'buttonState' => $buttonState, 'authors' => $authors] );
			
		}
	}
