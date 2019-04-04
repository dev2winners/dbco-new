<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use App\DbcoSolution;
	use App\DbcoCustomer;
	
	class ToggleSolutionAjaxController extends Controller
	{
		public function __construct()
		{
			$this->middleware('verified');
		}
		
		public function getState($dbco_customer, $isolutionid)
		{
			
			$state = '';
			If($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$isolutionid)->where('deleted_at','=',null)->count()) 
			{ // если существует запись в pivot и флаг удаления НЕ установлен
				$state = 11;	
			} elseif ($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$isolutionid)->where('deleted_at','!=',null)->count()) 
			{ // если существует запись в pivot и флаг удаления установлен
				$state = 10;
			} else {
				$state = 0;
			}
		return $state;
			
		}		
		
		public function main(Request $request) // подключает/отключает $request->isolutionid солюшн
		{
			
			
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			$isolutionid = $request->isolutionid;
			$state = $this->getState($dbco_customer, $isolutionid);
			
			if(11 == $state) {
				$dbco_customer->dbcoSolutions()->updateExistingPivot($isolutionid, ['deleted_at' => date("Y-m-d H:i:s"),'iinstallstate' => 0]); //устанавливаем флаг удаления
			} elseif(10 == $state) {
				$dbco_customer->dbcoSolutions()->updateExistingPivot($isolutionid, ['deleted_at' => null, 'iinstallstate' => 1]); // снимаем флаг удаления
			} else {
				$dbco_customer->dbcoSolutions()->attach($isolutionid); //если ни то ни другое - создаем запись в pivot
				// по умолчанию MySQL ставит iinstallstate в таблице в 1, а iinstallstateext - в 0
			}
			
			$state = $this->getState($dbco_customer, $isolutionid); //повторно получаем State
			
			echo '{"state":"'.$state.'"}';
			
			//echo $state;
			//echo $request->isolutionid;		 
			//echo rand(0,1); 
			
		}
		
	}
