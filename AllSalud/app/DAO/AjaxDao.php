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
                      ->orderBy('ciudad_nombre', 'asc')
                      
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


    $ciudad_id = $request->ciudad_id;
    $tipo_id = $request->tipo_id;
    $especialidad_id = $request->especialidad_id;

    $establecimientos = DB::table('establecimientos')
                            ->join('domicilios','establecimientos.id','domicilios.establecimiento_id')
                            ->join('ciudades','domicilios.ciudad_id','ciudades.id')

                            ->when($ciudad_id,function($query,$ciudad_id){
                               return $query->where('domicilios.ciudad_id',$ciudad_id);  
                            })

                            ->when($especialidad_id,function($query,$especialidad_id){
                               return $query->whereExists(function ($query) use ($especialidad_id) {
                                      $query->select(DB::raw(1))
                                            ->from('especialidades_establecimientos')
                                            ->where('especialidades_establecimientos.especialidad_id',$especialidad_id)
                                            ->whereRaw('especialidades_establecimientos.establecimiento_id = establecimientos.id');
                                  });
                            })

                            ->when($tipo_id,function($query,$tipo_id){
                               return $query->whereExists(function ($query) use ($tipo_id) {
                                        $query->select(DB::raw(1))
                                        ->from('tipo_establecimiento_domicilio')
                                        ->where('tipo_establecimiento_domicilio.tipo_id',$tipo_id)
                                        ->whereRaw('tipo_establecimiento_domicilio.domicilio_id = domicilios.id');
                              });
                            })
                            ->get();



                            /*->whereExists(function ($query) use ($request) {
                                  $query->select(DB::raw(1))
                                        ->from('tipo_establecimiento_domicilio')
                                        ->where('tipo_establecimiento_domicilio.tipo_id',$request->tipo_id)
                                        ->whereRaw('tipo_establecimiento_domicilio.domicilio_id = domicilios.id');
                              })



                            ->whereExists(function ($query) use ($request) {
                                  $query->select(DB::raw(1))
                                        ->from('especialidades_establecimientos')
                                        ->where('especialidades_establecimientos.especialidad_id',$request->especialidad_id)
                                        ->whereRaw('especialidades_establecimientos.establecimiento_id = establecimientos.id');
                              })*/
     



     /*$establecimientos = DB::table('establecimientos')
                            ->join('domicilios','establecimientos.id','domicilios.establecimiento_id')
                            ->join('ciudades','domicilios.ciudad_id','ciudades.id')
                            ->where('domicilios.ciudad_id',$request->ciudad_id)
                            ->whereExists(function ($query) use ($request) {
                                  $query->select(DB::raw(1))
                                        ->from('tipo_establecimiento_domicilio')
                                        ->where('tipo_establecimiento_domicilio.tipo_id',$request->tipo_id)
                                        ->whereRaw('tipo_establecimiento_domicilio.domicilio_id = domicilios.id');
                              })
                            ->whereExists(function ($query) use ($request) {
                                  $query->select(DB::raw(1))
                                        ->from('especialidades_establecimientos')
                                        ->where('especialidades_establecimientos.especialidad_id',$request->especialidad_id)
                                        ->whereRaw('especialidades_establecimientos.establecimiento_id = establecimientos.id');
                              })
                            ->get();*/

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

      $domicilio->delete();

      return true;

    }


}
