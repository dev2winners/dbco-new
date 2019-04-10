<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class Page extends Model
	{
		
		public $page = [];
		
		public function setPageDataForView($uri) {
			
			$pageObj = $this->where('uri',$uri)->first();
			if($pageObj){
				$this->page['title'] = json_decode($pageObj->meta)->title;
				
				if($pageObj->content) {
					foreach (json_decode($pageObj->content) as $content){
						$this->page['content'][$content->id]['title'] = $content->title;
						$this->page['content'][$content->id]['text'] = $content->text;
					}				
				}				
			}
			
			return $this->page;
		}
	}
