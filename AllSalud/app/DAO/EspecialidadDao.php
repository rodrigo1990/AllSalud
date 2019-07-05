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


  public function getEspecialidadesAsignadasEstablecimiento(){
    return DB::table('especialidades AS ESP')
			    ->whereExists(function ($query) {
				                    $query->select(DB::raw(1))
			                            ->from('especialidades_establecimientos AS EE')
			                            ->whereRaw('ESP.id = EE.especialidad_id');
			                  	})
    			->get();
  }
   
 


}
