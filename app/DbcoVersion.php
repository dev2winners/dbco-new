<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DbcoVersion extends Model
	{
		protected $table = 'dbco_version';
		public $primaryKey = 'iversionid';
	}
