<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class Ticket extends Model
	{
		protected $table = 'dbco_ticket';
		public $primaryKey = 'iticketid';
		public $timestamps = false;
		
		protected $fillable = [
        'ctickettext',
		'bticketfile',
		'itickettype',
		'iticketobject'
		];
		
		/*protected $guarded = [
        'iticketid'
		];*/
	}
