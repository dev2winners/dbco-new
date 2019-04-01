<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DbcoTicketType extends Model
	{
		protected $table = 'dbco_tickettype';
		public $primaryKey = 'itickettypeid';
		public $timestamps = false;
	}
