<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DbcoCustomer extends Model
	{
		
		//
		/*protected $fillable = [
			'ccustomername',
		];*/
		
		protected $table = 'dbco_customer';
		public $primaryKey = 'icustomerid';
		//public $timestamps = false;
		
		protected $guarded = [
        'icustomerid',
		];
		
		public function dbcoSolutions() { // делаем отношения с DbcoSolution
			return $this->belongsToMany('App\DbcoSolution', 'dbco_install', 'iinstallcustomer', 'iinstallsolution')->withTimestamps();
		}
		
		/*public function user()
		{
			return $this->belongsTo('App\User');
		}*/
		//
	}
