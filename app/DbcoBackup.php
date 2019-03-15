<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DbcoBackup extends Model
	{
		protected $table = 'dbco_backup';
		public $primaryKey = 'ibackupid';
		public $timestamps = false;
	}
