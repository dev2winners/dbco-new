<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DbcoDownload extends Model
	{
		protected $table = 'dbco_download';
		public $primaryKey = 'idownloadid';
		public $timestamps = false;
	}
