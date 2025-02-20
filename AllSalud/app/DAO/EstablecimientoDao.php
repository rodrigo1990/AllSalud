<?php

namespace App\DAO;

use Illuminate\Http\Request;
use App\Establecimiento;
use Illuminate\Support\Facades\DB;

class EstablecimientoDao
{

    function getProvinciasPorEstablecimiento($id){
         $provincias=DB::table('establecimientos')
                      ->join('establecimiento_ciudad','establecimientos.id','establecimiento_ciudad.establecimiento_id')
                      ->join('ciudades','establecimiento_ciudad.ciudad_id','ciudades.id')
                      ->join('provincias','ciudades.provincia_id','provincias.id')
                      ->where('establecimientos.id', $id)
                      ->select('provincias.provincia_nombre')
                      ->get();

        return $provincias;
    }




    function createEstablecimiento($request){
      
      $establecimiento = new Establecimiento();

      $establecimiento->nombre=$request->nombre;
      $establecimiento->tipo_id=$request->get('tipo');


      $establecimiento->save();
        
      $establecimiento = Establecimiento::find($establecimiento->id);

        foreach ($request->establecimientos as $domicilio) {
          
          $establecimiento->Domicilio()->attach($domicilio['localidad'],['domicilio'=>$domicilio['domicilio'],'latitud'=>$domicilio['latitud'],'longitud'=>$domicilio['longitud'],'telefono'=>$domicilio['telefono']]);

        }


        foreach ($request->especialidades as $especialidad) {
          
          if($especialidad!="null")
            $establecimiento->Especialidad()->attach($especialidad);

        }
        
        

 

    }





    public function detalleEstablecimiento($request){
      
        $establecimiento = Establecimiento::find($request->id);


        return $establecimiento;   
    }


    public function updateEstablecimiento($request){

      $establecimiento = Establecimiento::find($request->id);

      $establecimiento->nombre = $request->nombre;

      $establecimiento->tipo_id = $request->tipo_id;

      $establecimiento->save();

      //actualizo o elimino domicilios
      foreach ($request->establecimientos as $domicilio) {
          
            DB::table('establecimiento_ciudad')
            ->updateOrInsert(
              ['id' => $domicilio['establecimiento_ciudad_id'],'establecimiento_id' => $request->id  ],
              ['ciudad_id'=>$domicilio['ciudad'], 'domicilio'=>$domicilio['domicilio'],'latitud'=>$domicilio['latitud'],'longitud'=>$domicilio['longitud'],'telefono'=>$domicilio['telefono']]);  
          

        }

      if($request->especialidadesExistentes){
        //elimino especialidades que tengan como value eliminar
        foreach($request->especialidadesExistentes as $especialidadExistente){
            if($especialidadExistente['especialidad']=="eliminar")
               $establecimiento->Especialidad()->wherePivot('id',$especialidadExistente['registro_id'])->detach();
            
        }
      }

      //creo especialidades nuevas que se hallan seleccionado
      foreach($request->especialidades as $especialidad){

          if($especialidad!="null")
            $establecimiento->Especialidad()->attach($especialidad);
          
      }


  
     }//function


     public function getEstablecimientos(){
        return Establecimiento::all();
       }


  







   
   
}
