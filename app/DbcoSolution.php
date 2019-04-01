<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DbcoSolution extends Model
	{
		
		//protected $table = 'solutions';
		
		protected $table = 'dbco_solution';
		public $primaryKey = 'isolutionid';
		public $timestamps = false;
		
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
		
		
		
		//		
		/*public function user() {
			return $this->belongsToMany('App\User')->withTimestamps();
		}*/
	}
