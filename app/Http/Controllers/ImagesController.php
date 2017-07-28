<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImagesController extends Controller
{
    public function index(){

    	return view('images');

    }

    public function imageContent(){

    	return view('image_content');

    }

    public function archives(){

    	return view('archives');

    }

    public function getArchive(){

    	$files = File::allFiles("images");

    	for($i = 0; $i < count($files); $i++){

    		$data[$i] = (string)$files[$i];
    	
    	}

    	echo json_encode($data);
    }
}
