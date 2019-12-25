<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
    use mysql_xdevapi\Collection;

    class DbcoSolution extends Model
	{
		
		//protected $table = 'solutions';
		
		protected $table = 'dbco_solution';
		public $primaryKey = 'isolutionid';
		public $timestamps = false;
		
		public $isOwned = 0; // принадлежит ли текущему пользователю (DbcoCustomer)
		
		public function createSolutionButtonStateData($state) {
			if('success' == $state){
				$result = ['state' => 'secondary', 'text' => 'Это уже мое'];	
				}elseif('primary' == $state){
				$result = ['state' => 'primary', 'text' => 'Подключить'];	
				}elseif('secondary' == $state){
				$result = ['state' => 'secondary', 'text' => 'Авторизуйтесь'];	
			}
			return $result;
		}


		public function  translate($lang){
$solution=$this;
$translate['csolutionname']=$solution->csolutionname;
$translate['csolutiontext']=$solution->csolutiontext;
$translate['csolutionhtml']=$solution->csolutionhtml;
$translate['csolutionpicture']=$solution->csolutionpicture;
$translate['csolutiontechnicshtml']=$solution->csolutiontechnicshtml;
if($lang!='ru'){
    $solution=DbcoSolutiontranslate::where('isolutionid',$solution->isolutionid)->where('csolutiontranslatelanguage',$lang)->first();
    if($solution){

        $translate['csolutionname']=$solution->csolutionname;
        $translate['csolutiontext']=$solution->csolutiontext;
        $translate['csolutionhtml']=$solution->csolutionhtml;
        $translate['csolutionpicture']=$solution->csolutionpicture;
        $translate['csolutiontechnicshtml']=$solution->csolutiontechnicshtml;

    }


}

return $translate;
        }
		
		
		//		
		/*public function user() {
			return $this->belongsToMany('App\User')->withTimestamps();
		}*/
	}
