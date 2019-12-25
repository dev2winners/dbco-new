<?php
	
	namespace App;
	
	use Illuminate\Notifications\Notifiable;
	/*use Illuminate\Contracts\Auth\MustVerifyEmail;*/
	use Illuminate\Foundation\Auth\User as Authenticatable;
	
	class User extends Authenticatable/* implements MustVerifyEmail*/
	{
		use Notifiable;
		
		/**
			* The attributes that are mass assignable.
			*
			* @var array
		*/
		protected $fillable = [
        'name', 'email', 'password','verify_code'
		];
		
		/**
			* The attributes that should be hidden for arrays.
			*
			* @var array
		*/
		protected $hidden = [
        'password', 'remember_token',
		];
		/**
			* Defining Relationship
		*/
		public function customer()
		{
			return $this->hasOne('App\Customer');
		}
		
		public function dbcoCustomers()
		{
			return $this->hasMany('App\DbcoCustomer');
		}
		
		/*public function dbcoSolutions() { // реальный вариант
			return $this->belongsToMany('App\DbcoSolution', 'dbco_install', 'iinstallcustomer', 'iinstallsolution')->withTimestamps();
		}*/
		
	}
