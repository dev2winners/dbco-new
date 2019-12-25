<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class Page extends Model
	{
		
		public $page = [];
		
		public function setPageDataForView($url) {

            $page=\DB::table('dbco_paragraph')->where('cparagraphpage',$url)->where('cparagraphlang',\App::getLocale())->get();
foreach ($page as $item){

    $this->page[$item->cparagraphtag]=$item;

}
			return $this->page;
		}
	}
