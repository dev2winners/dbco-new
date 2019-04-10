<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DbcoDownload;
use App\Page;

class DbcoResourceController extends Controller
{
    public function main(DbcoDownload $download, Page $pages)
    {
        
		$languages = $download->where('cdownloadfolder','language')->paginate(20);
		$docs = $download->where('cdownloadfolder','doc')->paginate(20);
		$addins = $download->where('cdownloadfolder','add')->paginate(20);
		
		return view('dbco.resources.main',['languages' => $languages,'docs' => $docs,'addins' => $addins, 'page' => $pages->setPageDataForView('/resources')]);
    }
}
