<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use App\DbcoCustomer;
	use App\DbcoSolution;
	
	class ServiceClassController extends Controller //класс с различными общими функциями
	{
		
		/**************
		setIsOwnedSolutionFlag
		принимает экземпляр текущего App\DbcoCustomer и актуальную коллекцию App\DbcoSolution
		устанавливает каждому $solution флаг принадлежности текущему пользователю
		****************/
		
		public static function setIsOwnedSolutionFlag($dbco_customer, $solutions) {
			
			$own_solutions_isolutionid = $dbco_customer->getOwnSolutionsIsolutionid(); //получаем id всех солюшенов пользователя
			foreach($solutions as $solution) { //в цикле устанавливаем isOwned для каждого солюшена					
				if($own_solutions_isolutionid->contains($solution->isolutionid)){
					$solution->isOwned = 1;
				}					
			}		
		}
	}
