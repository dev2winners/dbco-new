<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use App\Page;
	use App\DbcoCustomer;
	use App\DbcoSolution;
	use Illuminate\Support\Facades\Auth;
	
	class TestController extends Controller
	{
		//
		public function index(Page $pages) {
			
			
			$solutions = DbcoSolution::where('isolutiontype', 1)->where('isolutiondeleted', 0)->get();
			
			if (Auth::check()) {
				$dbco_customer = DbcoCustomer::getCurrentCustomer();
				$own_solutions_isolutionid = $dbco_customer->getOwnSolutionsIsolutionid();
				
				//dd($solutions);
				
				foreach($solutions as $solution) {
					
					if($own_solutions_isolutionid->contains($solution->isolutionid)){
						$solution->isOwned = 1;
					}
					
				}
				
				dd($solutions);
			}
			
			/****************************
				
			**************************/
			
			$uri = '/';
			$pageObj = $pages->where('uri',$uri)->first();
			$page['title'] = json_decode($pageObj->meta)->title;
			
			if($pageObj->content) {
				foreach (json_decode($pageObj->content) as $content){
					$page['content'][$content->id]['title'] = $content->title;
					$page['content'][$content->id]['text'] = $content->text;
				}				
			}
			
			
			return view('dbco.test', ['page' => $page]);
			
		}
	}
