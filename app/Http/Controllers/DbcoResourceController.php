<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DbcoDownload;
use App\Page;

class DbcoResourceController extends Controller
{
    public function main(DbcoDownload $download, Page $pages)
    {
        
		$languages = $download->where('cdownloadfolder','language')->get();
		$docs = $download->where('cdownloadfolder','doc')->get();
		$addins = $download->where('cdownloadfolder','add')->get();
		
		return view('dbco.resources.main',['languages' => $languages,'docs' => $docs,'addins' => $addins, 'page' => $pages->setPageDataForView('resources')]);
    }
}
