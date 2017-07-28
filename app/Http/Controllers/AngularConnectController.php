<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AngularConnectController extends Controller
{
    public function index(Request $req){

      $request = $req->json()->all();
      
      if(count($request) == 0){
        
        for($i = 0; $i < count($req->file('file')); $i++){

          $values = [];

          $imageName = time().rand(11111,99999).'.'.$req->file('file')[$i]->getClientOriginalExtension();
          $req->file('file')[$i]->move(public_path($req->input('path')), $imageName);

          foreach ($req->input() as $key => $item) {

            if($key != "path" && $key != "_token" && $key != "file"){
              
              if($req->input($key) == "fileType"){

                $values[$key] = $imageName; 

              }
              else{

                $values[$key] = $item;

              } 
            
            }

          }
           if(isset($values['where'])){
              $values['where'] = json_decode($values['where']);
           }
           $values['table'] = $req->input('table');
           $this->insert($values);
        } 



      }
      else{

        if($request['type'] == "insert"){ 
          $this->insert($request);
        }

        if($request['type'] == "select") {
          $this->select($request);
        }

        if($request['type'] == "delete"){
          $this->delete($request);
        }

      }
      

    }

    public function insert($data){

      $values = [];

      $updateQuery = " set ";
      foreach ($data as $key => $item) {

        if($key != "type" && $key != "table" && $key != "where"){
          $values[$key] = addslashes($item);
          $updateQuery .= $key." = '".addslashes($item)."' ,";  
        }

      }

      $updateQuery = substr($updateQuery, 0, strlen($updateQuery)-1);
      
      if(isset($data['where'])){

        if(DB::update('update '.$data['table'].$updateQuery.' where '.$data['where'][0], $data['where'][1])==0){

          DB::table($data['table'])->insert($values); 

        }
        
      }
      else{

        DB::table($data['table'])->insert($values); 
      
      }

    }

    public function select($data){

      $values = [];
      foreach ($data as $key => $item) {

        if($key != "type" && $key != "table"){
          $values[$key] = $item;
        }

      }

      if(isset($values['columns'])){ // with columns

        if(!is_array($values['columns'][0])){

          $query = "SELECT ";

          for($i = 0; $i < count($values['columns']); $i++){
            $query.= $values['columns'][$i]." ,";
          }

          $query = substr($query, 0, strlen($query)-1);
          $query.= "FROM ";

        }

        if(isset($values['where'])){ // with where

          $joinQuery = "SELECT ";

          if(isset($values['leftJoin'])){
            
            for($i = 0; $i < count($values['columns']); $i++){

              for($x = 0; $x < count($values['columns'][$i]); $x++){

                if($i == 0){

                  $joinQuery.= $data['table'].".".$values['columns'][$i][$x]." AS a_".$values['columns'][$i][$x].",";

                }
                else{

                  $joinQuery.= $values['leftJoin'][0].".".$values['columns'][$i][$x]." AS b_".$values['columns'][$i][$x].",";

                }

              }

            }
            $joinQuery = substr($joinQuery, 0, strlen($joinQuery)-1);
            $joinQuery.= " FROM ".$data['table'];
            $joinQuery.= " LEFT JOIN ".$values['leftJoin'][0]." ON ";
            $joinQuery.= $data['table'].".".$values['leftJoin'][1][0]." = ".$values['leftJoin'][0].".".$values['leftJoin'][1][1];
            $joinQuery.= ' where '.$values['where'][0];
            
            $result = DB::select($joinQuery, $values['where'][1]); 
            echo json_encode($result);
          }
          else{

            $result = DB::select($query.$data['table'].' where '.$values['where'][0], $values['where'][1]);
            echo json_encode($result);

          }

        }
        else{ // without where

          $joinQuery = "SELECT ";

          if(isset($values['leftJoin'])){
            
            for($i = 0; $i < count($values['columns']); $i++){

              for($x = 0; $x < count($values['columns'][$i]); $x++){

                if($i == 0){

                  $joinQuery.= $data['table'].".".$values['columns'][$i][$x]." AS a_".$values['columns'][$i][$x].",";

                }
                else{

                  $joinQuery.= $values['leftJoin'][0].".".$values['columns'][$i][$x]." AS b_".$values['columns'][$i][$x].",";

                }

              }

            }
            $joinQuery = substr($joinQuery, 0, strlen($joinQuery)-1);
            $joinQuery.= " FROM ".$data['table'];
            $joinQuery.= " LEFT JOIN ".$values['leftJoin'][0]." ON ";
            $joinQuery.= $data['table'].".".$values['leftJoin'][1][0]." = ".$values['leftJoin'][0].".".$values['leftJoin'][1][1];
            
            $result = DB::select($joinQuery); 
            echo json_encode($result);

          }
          else if(isset($values['join'])){
            echo "join";
          }
          else if(isset($values['rightJoin'])){
            echo "right";
          }
          else{

            $result = DB::select($query.$data['table']);
            echo json_encode($result);
          
          }

        }
        
      }
      else{ //without columns

        if(isset($values['where'])){ // with where

          $result = DB::select('select * from '.$data['table'].' where '.$values['where'][0], $values['where'][1]);
          echo json_encode($result);

        }
        else{ // without where

          $result = DB::table($data['table'])->get();
          echo json_encode($result);

        }

      }
    }

    public function delete($data){

      $values = [];
      foreach ($data as $key => $item) {

        if($key != "type" && $key != "table"){
          $values[$key] = $item;
        }

      }

      DB::delete('delete from '.$data['table'].' where '.$values['where'][0], $values['where'][1]);

    }
}
