<?php
	
	namespace App\Http\Controllers;
	
	use App\DbcoSolution;
	use App\DbcoCustomer;
	use App\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	
	class DbcoSolutionController extends Controller
	{
		/**
			* Display a listing of the resource.
			*
			* @return \Illuminate\Http\Response
		*/

		
		public function index() // 
		{
			
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			//dd($user);
			
			$solutions = DbcoSolution::where('isolutiontype', 1)->paginate(4); //норм
			
			foreach($solutions as $solution){ 
				
				$sid = $solution->isolutionid;
				
				
				$danger_or_success[$sid]['state'] = 'danger';
				$danger_or_success[$sid]['text'] = 'НЕ ПОДКЛ.';
				
				
				If($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$sid)->where('deleted_at','=',null)->count()) { // если существует запись в pivot и флаг удаления не установлен
					$isRelation = true;
					} else {
					$isRelation = false;
				}
				
				
				if($isRelation) {
					$danger_or_success[$sid]['state'] = 'success';
					$danger_or_success[$sid]['text'] = 'ПОДКЛЮЧЕНО';
				}
				
			}
			
			return view('dbco.solutions.index', ['solutions' => $solutions, 'danger_or_success' => $danger_or_success]);
			
		}
		
		public function toggle($sid) // принимает id солюшена
		{
			
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			If($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$sid)->where('deleted_at','=',null)->count()) 
			{ // если существует запись в pivot и флаг удаления НЕ установлен
				$dbco_customer->dbcoSolutions()->updateExistingPivot($sid, ['deleted_at' => date("Y-m-d H:i:s")]); //устанавливаем флаг
			} elseif ($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$sid)->where('deleted_at','!=',null)->count()) 
			{ // если существует запись в pivot и флаг удаления установлен
				$dbco_customer->dbcoSolutions()->updateExistingPivot($sid, ['deleted_at' => null]); // снимаем флаг удаления
				} else {
				$dbco_customer->dbcoSolutions()->attach($sid); //если ни то ни другое - создаем запись в pivot
			}
			
			
			//return redirect()->route('dbcosolution.index');
			return back();
			
		}
		
	}														