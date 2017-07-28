<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language_attr;
use DB;

class DashboardController extends Controller
{
    public function index(Request $request){

    	if($request->session()->has('user_id')){
    		
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

                        array_push($data, json_decode(json_encode($imageResult[$x]), true));

                    }

                }

                $imageAttr[$attribute[$i]] = $data;

            }

            foreach ($result as $item) {

                if(isset($_COOKIE['language'])){

                    if($_COOKIE['language']=='eng'){

                        $data[$item->attribute] = $item->eng_translation;

                    }
                    else{

                        $data[$item->attribute] = $item->jap_translation;

                    }

                }
                else{

                    $data[$item->attribute] = $item->eng_translation;

                }
            
            } 
            $data += $imageAttr; 
    		return view('langAttr', $data);	
    	
    	}
    	else{

    		return redirect('login');
    	
    	}

    }

    public function sample(Request $request){
            // var_dump($request);

            $imageName = time().rand(11111,99999).'.'.$request->file('photo')[1]->getClientOriginalExtension();
            $request->file('photo')[1]->move(public_path('images'), $imageName);
            echo $imageName;

        
        var_dump($request->file('photo'));
    }

}
