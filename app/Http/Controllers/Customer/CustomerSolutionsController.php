<?php
	
	namespace App\Http\Controllers\Customer;
    use Session;
	use App\DbcoCustomer;
	use App\DbcoVersion;
    use App\Ticket;
    use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Http\Controllers\ServiceClassController;
	
	class CustomerSolutionsController extends Controller
	{
		public function __construct()
		{
		 $this->middleware('verified');
		}
		
		public function main()
		{

			$viewversions = [];
            $viewversions_install=[];
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			$solutions = $dbco_customer->dbcoSolutions()->where('isolutiontype','1')->orderBy('dbco_install.dinstalldate', 'desc')->get();
					
			
			if($solutions){
			
			ServiceClassController::setIsOwnedSolutionFlag($dbco_customer, $solutions); ////устанавливаем isOwned для каждого солюшена в коллекции для отображения в представлении
                $isInLoad= ServiceClassController::get_array_load_solution($dbco_customer, $solutions);
				foreach($solutions as $solution) {
					
					$dbco_version = DbcoVersion::where('iversionid', $solution->isolutionversion)->first();
					$version = (is_object($dbco_version)) ? $dbco_version->cversion : '-';
					$viewversions[$solution->isolutionid] = $version;
                    $dbco_version_install = DbcoVersion::where('iversionid', $solution->pivot->iinstallversion)->first();
                    if($dbco_version_install){
                        $version1 = (is_object($dbco_version_install)) ? $dbco_version_install->cversion : '';
                        $viewversions_install[$solution->isolutionid] = $version1;

                    }
				}
				
			}

			return view('dbco.customer.customersolutions.main', ['solutions' => $solutions, 'viewversions' => $viewversions,'viewversions_install'=>$viewversions_install,'customer'=>$dbco_customer,'isInLoad'=>$isInLoad]);
			
		}
		public function getupdate(){

            $dbco_customer = DbcoCustomer::getCurrentCustomer();
            $solutions = $dbco_customer->dbcoSolutions()->where('isolutiontype','1')->where('isolutionid',request()->get('isolutionid'))->first();
if($solutions->isolutionversion!=$solutions->pivot->iinstallversion){


     $solution_instll=\DB::table('dbco_install')->where('iinstallcustomer',$dbco_customer->icustomerid)->where('iinstallsolution',request()->get('isolutionid'))->first();

    Ticket::create_notification($solution_instll->iinstallid,620);

    session()->flash('update_ok',1);

 return redirect()->route('customersolutions.main')->with(['update_ok'=>'1']);
}



        }
	}
