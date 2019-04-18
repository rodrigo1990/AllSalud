<?php

namespace App\DAO;

use Illuminate\Http\Request;
use App\Domicilio;
use Illuminate\Support\Facades\DB;


class DomicilioDAO 
{
    
  public function getTipoPorDomicilio($id){

    $tipos=DB::table('tipo_establecimiento_domicilio')
                  ->join('domicilios','domicilios.id','tipo_establecimiento_domicilio.domicilio_id')
                  ->join('tipo_establecimientos','tipo_establecimiento_domicilio.tipo_id','tipo_establecimientos.id')
                   ->where('tipo_establecimiento_domicilio.domicilio_id','=',$id)
                   ->select('tipo_establecimiento_domicilio.id','tipo_establecimiento_domicilio.domicilio_id','tipo_establecimiento_domicilio.tipo_id','tipo_establecimientos.descripcion')
                  ->get();

    return $tipos;

  }


}
