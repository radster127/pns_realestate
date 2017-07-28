<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LandPageController extends Controller
{
    public function index(Request $request){

	    $result         = DB::table('tbl_language_attr')
                        ->leftJoin('tbl_translation', 'tbl_language_attr.id', '=', "tbl_translation.attribute_id")
                        ->get();
        $imageResult    = DB::table('tbl_image_attr')
                        ->leftJoin('tbl_images', 'tbl_image_attr.id', '=', "tbl_images.attribute_id")
                        ->get();


        $attribute = [];

        for($i = 0; $i < count($imageResult); $i++){

            $isRepeated = false;
            for($x = 0; $x < count($attribute); $x++){

                if($imageResult[$i]->attribute == $attribute[$x]){

                    $isRepeated = true;
                
                }

            }
            if(!$isRepeated){

                array_push($attribute, $imageResult[$i]->attribute);
                
            }

        }

        $imageAttr   = [];

        for($i = 0; $i < count($attribute); $i++){
            $data = [];
            for($x = 0; $x < count($imageResult); $x++){

                if($imageResult[$x]->attribute == $attribute[$i]){
                	$imageResult[$x]->image_name = "images/".$imageResult[$x]->image_name;
                    array_push($data, json_decode(json_encode($imageResult[$x]), true));

                }

            }

            $imageAttr[$attribute[$i]] = $data;

        }

        foreach ($result as $item) {

            if(isset($_COOKIE['language'])){

                if($_COOKIE['language']=='eng'){

                    $data[$item->attribute] = nl2br(e($item->eng_translation));

                }
                else{

                    $data[$item->attribute] = nl2br(e($item->jap_translation));

                }

            }
            else{

                $data[$item->attribute] = nl2br(e($item->eng_translation));

            }
        
        } 
        $data += $imageAttr; 
		return view('client.layout', $data);	

    }
}
