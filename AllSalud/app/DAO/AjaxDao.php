<?php

namespace App\DAO;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxDAO 
{
    

   
     public function buscarCiudadSegunProvincia($request){

        $ciudades=DB::table('ciudades')
                     
                      ->select('id','ciudad_nombre')
                      ->where('provincia_id','=',$request->provinciaId)
                      
                      ->get();


        return $ciudades;


  }
}
