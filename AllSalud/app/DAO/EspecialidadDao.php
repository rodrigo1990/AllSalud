<?php

namespace App\DAO;

use Illuminate\Http\Request;
use App\Especialidad;
use Illuminate\Support\Facades\DB;


class EspecialidadDao 
{
    
  public function getEspecialidades(){
    return Especialidad::orderBy('descripcion', 'asc')->get();
  }
   
 


}
