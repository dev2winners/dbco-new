<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DbcoFinance extends Model
	{
		protected $table = 'dbco_finance';
		public $primaryKey = 'ifinanceid';
	}
