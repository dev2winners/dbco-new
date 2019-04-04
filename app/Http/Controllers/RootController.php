<?php
	
	namespace App\Http\Controllers;
	
	use App\DbcoCustomer;
	use App\DbcoSolution;
	use Illuminate\Http\Request;
	use App\Http\Controllers\DbcoSolutionController;
	use Illuminate\Support\Facades\Auth;
	use App\Page;
	
	class RootController extends Controller
	{
		//
		public function index(DbcoSolutionController $dsc, Page $pages) {
						
			$solutions = DbcoSolution::where('isolutiontype', 1)->where('isolutiondeleted', 0)->get();
			
			$authors = [];			
			
			/************** потом перенести это в модель >>>>>>>>>> ***************/
			$page = [];
			$uri = '/';
			$pageObj = $pages->where('uri',$uri)->first();
			$page['title'] = json_decode($pageObj->meta)->title;
			
			if($pageObj->content) {
				foreach (json_decode($pageObj->content) as $content){
					$page['content'][$content->id]['title'] = $content->title;
					$page['content'][$content->id]['text'] = $content->text;
				}				
			}			
			/************* <<<<<<<<<<<<<<< потом перенести это в модель ****************/
			
			/************** УСТАНАВЛИВАЕМ ФЛАГ ДЛЯ СОЛЮШЕНОВ ПОЛЬЗОВАТЕЛЯ >>>>>>>>>> ***************/
			if (Auth::check()) {
				$dbco_customer = DbcoCustomer::getCurrentCustomer();
				
				$own_solutions_isolutionid = $dbco_customer->getOwnSolutionsIsolutionid(); //получаем id всех солюшенов пользователя
				foreach($solutions as $solution) { //в цикле устанавливаем isOwned для каждого солюшена					
					if($own_solutions_isolutionid->contains($solution->isolutionid)){
						$solution->isOwned = 1;
					}					
				}
				
			}
			/************* <<<<<<<<<<<<<<< УСТАНАВЛИВАЕМ ФЛАГ ДЛЯ СОЛЮШЕНОВ ПОЛЬЗОВАТЕЛЯ ****************/
			
			foreach($solutions as $solution){
				if(isset($dbco_customer)){
					$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData($dsc->isSolutionRelated($solution, $dbco_customer));
					} else {				
					$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData('secondary');
				}
				
				$authors[$solution->isolutionid] = ($author = DbcoCustomer::where('icustomerid',$solution->isolutiondeveloper)->first()) ? $author->ccustomername : '';
			}

			
			return view('dbco.root',['solutions' => $solutions, 'buttonState' => $buttonState, 'authors' => $authors, 'page' => $page] );
			
		}
	}
