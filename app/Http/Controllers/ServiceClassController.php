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

        public static function get_array_load_solution($dbco_customer, $solutions) {
$array=[];
            $own_solutions_isolutionid = $dbco_customer->getOwnSolutions() ; //получаем id всех солюшенов пользователя

            foreach($own_solutions_isolutionid as $solution) {
                $solution_instll=\DB::table('dbco_install')->where('iinstallcustomer',$dbco_customer->icustomerid)->where('iinstallsolution',$solution->isolutionid)->first();
                //в цикле устанавливаем isOwned для каждого солюшена
              if($solution_instll) {


                  if ($solution_instll->iinstallstate != $solution_instll->iinstallstateext) {
                      $array[] = $solution->isolutionid;
                  }
              }
            }



            foreach ($solutions as $solution){

                $solution_instll=\DB::table('dbco_install')->where('iinstallcustomer',$dbco_customer->icustomerid)->where('iinstallsolution',$solution->isolutionid)->first();
                if($solution_instll){

                    $solution->iinstallstate=$solution_instll->iinstallstate;
                    $solution->iinstallstateext=$solution_instll->iinstallstateext;
                }
            }
          return $array;
        }

	}
