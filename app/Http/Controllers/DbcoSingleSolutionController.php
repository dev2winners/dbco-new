<?php
	
	namespace App\Http\Controllers;
	
	use App\DbcoSolution;
	use App\DbcoCustomer;
	use App\DbcoCategory;
	use App\User;
	use App\DbcoVersion;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use App\Http\Controllers\MssqlExtController;
	use App\Http\Controllers\ServiceClassController;
	
	class DbcoSingleSolutionController extends Controller
	{
		/**
			* Display a listing of the resource.
			*
			* @return \Illuminate\Http\Response
		*/
		
		public function isSolutionRelated($solution, $dbco_customer) // подключено решение к кастомеру или нет, принимает на вход экземпляр DbcoSolution и экземпляр DbcoCustomer
		{			
			If($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$solution->isolutionid)->where('deleted_at','=',null)->count()) { // если существует запись в pivot и флаг удаления не установлен
				return 'success';
				} else {
				return 'primary';
			}			
		}
		
		
		
		public function main($sid) // принимает id солюшена
		{			
			
			$solution = DbcoSolution::findOrFail($sid);
			
			$dother_solutions = DbcoSolution::where('isolutionparent', $sid)->paginate(22);
			
			$author_name = ($author = DbcoCustomer::where('icustomerid',$solution->isolutiondeveloper)->first()) ? $author->ccustomername : '';
			
			$dbco_version = DbcoVersion::where('iversionid', $solution->isolutionversion)->first();
			$version = (is_object($dbco_version)) ? $dbco_version->cversion : '';
			
			//dd(DbcoVersion::where('iversionid', $solution->isolutionversion)->first());
			
			if (Auth::check())
			{
				$dbco_customer = DbcoCustomer::getCurrentCustomer();
				$solutions = collect([$solution]); // костыль для использования следующей функции (ему нужна коллекция на вход):
				ServiceClassController::setIsOwnedSolutionFlag($dbco_customer, $solutions); ////устанавливаем isOwned для каждого солюшена в коллекции для отображения в представлении
				
				
				$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData($this->isSolutionRelated($solution, $dbco_customer));
				
				if($dother_solutions->count()) {
					foreach($dother_solutions as $dother_solution){	
						
						$buttonState[$dother_solution->isolutionid] = $dother_solution->createSolutionButtonStateData($this->isSolutionRelated($dother_solution, $dbco_customer));
						
					}
					
					ServiceClassController::setIsOwnedSolutionFlag($dbco_customer, $dother_solutions); ////устанавливаем isOwned для каждого солюшена в коллекции для отображения в представлении
				} 
				
				} else {				
				
				$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData('secondary');
				
				if($dother_solutions->count()) {
					foreach($dother_solutions as $dother_solution){	
						
						$buttonState[$dother_solution->isolutionid] = $dother_solution->createSolutionButtonStateData('secondary');
						
					}
				}
				
			}			
			
			$page['title'] = $solution->csolutionname;
			
			return view('dbco.solutions.single', ['solution' => $solution, 'buttonState' => $buttonState, 'dother_solutions' => $dother_solutions, 'author_name' => $author_name, 'version' => $version, 'page' => $page]);
			
		}
		
		public function toggle($sid) // принимает id солюшена
		{
			
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			If($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$sid)->where('deleted_at','=',null)->count()) 
			{ // если существует запись в pivot и флаг удаления НЕ установлен
				$dbco_customer->dbcoSolutions()->updateExistingPivot($sid, ['deleted_at' => date("Y-m-d H:i:s"),'iinstallstate' => 0]); //устанавливаем флаг
			} elseif ($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$sid)->where('deleted_at','!=',null)->count()) 
			{ // если существует запись в pivot и флаг удаления установлен
				$dbco_customer->dbcoSolutions()->updateExistingPivot($sid, ['deleted_at' => null, 'iinstallstate' => 1]); // снимаем флаг удаления
				} else {
				$dbco_customer->dbcoSolutions()->attach($sid); //если ни то ни другое - создаем запись в pivot
				// по умолчанию MySQL ставит iinstallstate в таблице в 1, а iinstallstateext - в 0
			}
			
			//MssqlExtController::callMssqlProcedure('sp_update_install'); // оповещаем внешний сервер
			MssqlExtController::callMssqlProcedure('sp_update_install '.$dbco_customer->icustomerid); 
			
			//return redirect()->route('dbcosolution.index');
			return back();
			
		}
		
	}																											