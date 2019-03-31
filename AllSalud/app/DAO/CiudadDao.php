<?php

namespace App\DAO;

use Illuminate\Http\Request;
use App\Ciudad;
use Illuminate\Support\Facades\DB;


class CiudadDao 
{
    
    public function getCiudadesPorProvincia($provincia_id){
      $ciudades=Ciudad::where('provincia_id',$provincia_id)
                      ->get(); 
        return $ciudades;



    }

   
    
}
