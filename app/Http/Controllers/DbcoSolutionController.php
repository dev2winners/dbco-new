<?php
	
	namespace App\Http\Controllers;
	
	use App\DbcoSolution;
	use App\DbcoCustomer;
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
		
		private function isSolutionRelated($solution, $dbco_customer) // подключено решение к кастомеру или нет, принимает на вход экземпляр DbcoSolution и экземпляр DbcoCustomer
		{			
			If($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$solution->isolutionid)->where('deleted_at','=',null)->count()) { // если существует запись в pivot и флаг удаления не установлен
				return true;
				} else {
				return false;
			}			
		}
		
		private function setButton($state) // возвращает массив с значениями для кнопки решений
		{			
			If($state) { // если существует запись в pivot и флаг удаления не установлен
				return ['state' => 'success', 'text' => 'ЭТО УЖЕ ВАШЕ'];
				} else {
				return ['state' => 'primary', 'text' => 'ПОДКЛЮЧИТЬ?'];
			}			
		}
		
		public function index() // 
		{
			
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			//dd($user);
			
			$solutions = DbcoSolution::where('isolutiontype', 1)->paginate(4); //норм
			
			foreach($solutions as $solution){	
				
				$buttonState[$solution->isolutionid] = $this->setButton($this->isSolutionRelated($solution, $dbco_customer));
				
			}
			
			return view('dbco.solutions.index', ['solutions' => $solutions, 'buttonState' => $buttonState]);
			
		}
		
		
		public function single($sid) // принимает id солюшена
		{			
			
			$solution = DbcoSolution::findOrFail($sid);
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			$buttonState[$sid] = $this->setButton($this->isSolutionRelated($solution, $dbco_customer));
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
			
			MssqlExtController::callMssqlProcedure('sp_update_install'); // оповещаем внешний сервер
			
			//return redirect()->route('dbcosolution.index');
			return back();
			
		}
		
	}																					