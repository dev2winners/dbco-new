<?php
	
	namespace App\Http\Controllers;
	
	use App\DbcoSolution;
	use App\DbcoCustomer;
	use App\DbcoCategory;
	use App\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use App\Http\Controllers\MssqlExtController;
	
	class DbcoSolutionController extends Controller
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
		
		public function index($isolutioncategory = 1, DbcoCategory $dbco_category) // 
		{
			
			$buttonState = [];
			
			//dd($isolutioncategory);
			
			//$solutions = DbcoSolution::where('isolutiontype', 1)->paginate(4); 
			
			$categories = $dbco_category->get();
			$current_category_tag = ($isolutioncategory) ? $dbco_category->find($isolutioncategory)->ccategorytag : '#';
			
			//dd($current_category_tag);
			
			//$solutions = ($isolutioncategory) ? DbcoSolution::where('isolutiontype', 1)->where('isolutioncategory', $isolutioncategory)->paginate(4) : DbcoSolution::where('isolutiontype', 1)->paginate(4); // если задано $isolutioncategory - делаем выборку по нему
			
			$solutions = DbcoSolution::where('isolutiontype', 1)->where('csolutioncoltag','like', '%'.$current_category_tag.'%')->paginate(4);
			
			//$solutions = DbcoSolution::where('isolutiontype', 1)->paginate(4);
			
			//dd($solutions);
			
			
			if (Auth::check())
			{
				$dbco_customer = DbcoCustomer::getCurrentCustomer();			
				foreach($solutions as $solution){	
					
					$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData($this->isSolutionRelated($solution, $dbco_customer));
					
				}
				} else {
				foreach($solutions as $solution){	
					
					$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData('secondary');
					
				}
			}
			
			
			return view('dbco.solutions.index', ['solutions' => $solutions, 'buttonState' => $buttonState, 'categories' => $categories, 'isolutioncategory' => $isolutioncategory]);
			
		}
		
		
		public function single($sid) // принимает id солюшена
		{			
			
			$solution = DbcoSolution::findOrFail($sid);
			
			if (Auth::check())
			{
				$dbco_customer = DbcoCustomer::getCurrentCustomer();
				
				$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData($this->isSolutionRelated($solution, $dbco_customer));				
				
				} else {				
				
				$buttonState[$solution->isolutionid] = $solution->createSolutionButtonStateData('secondary');			
				
			}			
			
			return view('dbco.solutions.single', ['solution' => $solution, 'buttonState' => $buttonState]);
			
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