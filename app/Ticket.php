<?php
	
	namespace App;
    use App\Http\Controllers\MssqlExtController;
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
		public static function  create_notification($id,$code,$verify_code=null){

		    $ticket=new Ticket();
		    $ticket->itickettype=$code;
		    $ticket->iticketobject=(int)$id;

		 if($code==500){
		     if($verify_code){
		        $ticket->ctickettext=$verify_code;
            }



		 }
		 if($code!==500){
             $dbco_customer = DbcoCustomer::getCurrentCustomer();
             $ticket->iticketcustomer=$dbco_customer->icustomerid;

         }
		    $ticket->save();

            MssqlExtController::callMssqlProcedure('sp_Notify '.$ticket->iticketid);
    }
	}
