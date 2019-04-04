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
        'icustomerid', 'ccustomermail', 'ccustomerphone'
		];
		
		public function dbcoSolutions() { // делаем отношения с DbcoSolution
			return $this->belongsToMany('App\DbcoSolution', 'dbco_install', 'iinstallcustomer', 'iinstallsolution')->withTimestamps()->withPivot('dinstalldate','iinstallstate','dinstalledit', 'iinstallversion');
		}
		
		public function dbcoFinance()
		{
			return $this->hasMany('App\DbcoFinance', 'ifinancecustomer');
		}
		
		public function dbcoBackup()
		{
			return $this->hasMany('App\DbcoBackup', 'ibackupcustomer');
		}
		
		public function dbcoTicket()
		{
			return $this->hasMany('App\Ticket', 'iticketcustomer');
		}
		
		public static function getCurrentCustomer() { // возвращает экземпляр текущего кастомера
			
			$user = Auth::user(); //получаем объект текущего пользователя
			$currentCustomer = self::firstOrNew(['user_id' => $user->id]); //ищем или создаем кастомера для текущего пользователя
			$user->dbcoCustomers()->save($currentCustomer); // сохраняем его в базе вместе с отношением к текущему юзеру
			
			return $currentCustomer;
			
		}
		
		public function getOwnSolutions() { // возвращает массив коллекций решений пользователя
			
			return $this->dbcoSolutions()->where('deleted_at','=',null)->get();
			
		}
		
		public function getOwnSolutionsIsolutionid() { // возвращает массив значений id ('isolutionid') решений пользователя
			
			return $this->getOwnSolutions()->pluck('isolutionid');
			
		}
		
		/*public function user()
			{
			return $this->belongsTo('App\User');
		}*/
		//
	}
