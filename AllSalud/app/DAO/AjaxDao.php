<?php

namespace App\DAO;

use Illuminate\Http\Request;
use App\Establecimiento;
use App\Domicilio;
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

  public function buscarPorTipoEstablecimiento($request){
  	$establecimientos = DB::table('establecimientos')
                      ->join('establecimiento_ciudad','establecimientos.id','establecimiento_ciudad.establecimiento_id')
                      ->join('ciudades','ciudades.id','establecimiento_ciudad.ciudad_id')
                      ->where('establecimientos.tipo_id','=',$request->id)
                      ->get();




        return $establecimientos;   
  }


   public function buscarEstablecimientoPorTipoProvinciaCiudadEspecialidad(Request $request){

    $establecimientos = DB::table('establecimientos')
                            ->join('especialidades_establecimientos','establecimientos.id','especialidades_establecimientos.establecimiento_id')
                            ->join('establecimiento_ciudad','establecimientos.id','establecimiento_ciudad.establecimiento_id')
                            ->join('ciudades','ciudades.id','establecimiento_ciudad.ciudad_id')
                            ->where('establecimientos.tipo_id',$request->tipo_id)
                            ->where('establecimiento_ciudad.ciudad_id',$request->ciudad_id)
                            ->where('especialidades_establecimientos.especialidad_id',$request->especialidad_id)
                            ->get();

     return $establecimientos;




          
    }



    public function deleteEstablecimiento( $request){
      
      $establecimiento =  Establecimiento::find($request->id);

      $domicilios = Domicilio::where('establecimiento_id',$request->id)->get();

      foreach($domicilios as $domicilio){

        $domicilio->Tipo()->detach();

      }

      

      $establecimiento->Domicilio()->delete();

      $establecimiento->Especialidad()->detach();

      $establecimiento->delete();

      return true;
    }

    public function deleteLocacion($request){

      $domicilio = Domicilio::find($request->idLocacion);

      $domicilio->Tipo()->detach();

      return true;

    }


}
