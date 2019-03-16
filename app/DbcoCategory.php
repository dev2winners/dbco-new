<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DbcoCategory extends Model
	{
		protected $table = 'dbco_category';
		public $primaryKey = 'icategoryid';
		public $timestamps = false;
	}
