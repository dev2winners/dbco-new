<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DbcoSolution extends Model
	{
		
		//protected $table = 'solutions';
		
		protected $table = 'dbco_solution';
		public $primaryKey = 'isolutionid';
		public $timestamps = false;
		
		//		
		/*public function user() {
			return $this->belongsToMany('App\User')->withTimestamps();
		}*/
	}
