<?php
	
	namespace App\Http\Controllers\Customer;
	
	use App\DbcoCustomer;
	use App\DbcoVersion;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	
	class CustomerSolutionsController extends Controller
	{
		public function __construct()
		{
			$this->middleware('verified');
		}
		
		public function main()
		{		
			
			$viewversions = [];
			
			$dbco_customer = DbcoCustomer::getCurrentCustomer();
			
			$solutions = $dbco_customer->dbcoSolutions()->where('isolutiontype','1')->orderBy('dbco_install.dinstalldate', 'desc')->get();
					
			
			if($solutions){
				foreach($solutions as $solution) {
					
					$dbco_version = DbcoVersion::where('iversionid', $solution->isolutionversion)->first();
					$version = (is_object($dbco_version)) ? $dbco_version->cversion : '-';
					$viewversions[$solution->isolutionid] = $version;
					
				}
				
			}
			
			return view('dbco.customer.customersolutions.main', ['solutions' => $solutions, 'viewversions' => $viewversions]);
			
		}
	}
