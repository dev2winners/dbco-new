<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\Auth;
	
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
		
		public static function getCurrentCustomer() { // возвращает текущего кастомера
			
				$user = Auth::user(); //получаем объект текущего пользователя
				$currentCustomer = self::firstOrNew(['user_id' => $user->id]); //ищем или создаем кастомера для текущего пользователя
				$user->dbcoCustomers()->save($currentCustomer); // сохраняем его в базе вместе с отношением к текущему юзеру
				
				return $currentCustomer;
				
		}
		
		/*public function user()
			{
			return $this->belongsTo('App\User');
		}*/
		//
		}
		