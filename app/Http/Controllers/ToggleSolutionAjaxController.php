<?php
	
	namespace App\Http\Controllers;
	
	use App\Ticket;
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
            If($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$isolutionid)->where('iinstallstate',1)->count())
            { // если существует запись в pivot и флаг удаления НЕ установлен
                $state = 11;
            } elseif ($dbco_customer->dbcoSolutions()->where('iinstallsolution','=',$isolutionid)->where('iinstallstate',0)->count())
            { // если существует запись в pivot и флаг удаления установлен
                $state = 10;
            } else {
                $state = 0;
            }
            return $state;


			
			/*$state = '';
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
			*/
		}		
		
		public function main(Request $request) // подключает/отключает $request->isolutionid солюшн
		{


			$dbco_customer = DbcoCustomer::getCurrentCustomer();

			if($request->isolutionid=='update'){
if($dbco_customer->icustomerautoupdatesolution==1){
    $dbco_customer->icustomerautoupdatesolution=0;
}else{
    $dbco_customer->icustomerautoupdatesolution=1;
}
                $dbco_customer->save();echo '{"state":"1'.$dbco_customer->icustomerautoupdatesolution.'"}';

          Ticket::create_notification($dbco_customer->icustomerid,510);
              return '';
            }
			$isolutionid = $request->isolutionid;
		  	  $state = $this->getState($dbco_customer, $isolutionid);

			if(11 == $state) {
				$dbco_customer->dbcoSolutions()->updateExistingPivot($isolutionid, [ 'iinstallstate' => 0]); //устанавливаем флаг удаления
               
			} elseif(10 == $state) {
				$dbco_customer->dbcoSolutions()->updateExistingPivot($isolutionid, ['deleted_at' => null, 'iinstallstate' => 1]); // снимаем флаг удаления


			} else {
				$dbco_customer->dbcoSolutions()->attach($isolutionid); //если ни то ни другое - создаем запись в pivot

				// по умолчанию MySQL ставит iinstallstate в таблице в 1, а iinstallstateext - в 0
			}


            $f=    \DB::table('dbco_install')->where('iinstallcustomer',$dbco_customer->icustomerid)->where ('iinstallsolution',$isolutionid)->first();
       Ticket::create_notification($f->iinstallid,600);
			$state = $this->getState($dbco_customer, $isolutionid); //повторно получаем State

			echo '{"state":"'.$state.'"}';
			
			//echo $state;
			//echo $request->isolutionid;		 
			//echo rand(0,1); 
			
		}

		public function getstatussolitions(){

       $data=[];
            $dbco_customer = DbcoCustomer::getCurrentCustomer();
            $f=[];
            $solution_instll=\DB::table('dbco_install')->where('iinstallcustomer',$dbco_customer->icustomerid)->wherein('iinstallsolution',request()->data)->get();
foreach ($solution_instll as $item){
if($item->iinstallstate!=$item->iinstallstateext){
    $data[$item->iinstallsolution]=$item->iinstallstate.''.$item->iinstallstateext.'';

}else{
    $data[$item->iinstallsolution]=(string)$item->iinstallstate;
}
}

     return json_encode($data);   }


     public function setsolutionstate()
     {
         $dbco_customer = DbcoCustomer::getCurrentCustomer();
         $f = [];
         $solution_instll = \DB::table('dbco_install')->where('iinstallcustomer', $dbco_customer->icustomerid)->where('iinstallsolution', request()->solid)->update(['iinstallraiting' => request()->get('rating')

         ]);
         $text = '';
         for ($i = 1; $i <= 5; $i++){

              if(request()->get('rating')<$i){$class=' mr-not';}else {$class='mr-ys';}
             $text.= '<i class="fas fa-star   mrm-'.$i.' star_cabinet '.$class.'" data-rating="'.$i.'" title="'.$i.'" data-solid="'.request()->get('solid').'"  style="padding-right: 7px !important;"></i>';

     }
$sol=\DB::table('dbco_install')->where('iinstallcustomer', $dbco_customer->icustomerid)->where('iinstallsolution', request()->solid)->first();
         Ticket::create_notification($sol->iinstallid,610);
         return $text ;
     }

	}
