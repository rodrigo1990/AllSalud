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



   /* function createEstablecimiento($request){
    	
    	$establecimiento = new Establecimiento();

    	$establecimiento->nombre=$request->nombre;
    	$establecimiento->tipo_id=$request->get('tipo');


    	$establecimiento->save();
        
        $establecimiento = Establecimiento::find($establecimiento->id);

        
        $establecimiento->Domicilio()->attach($request->get('localidad1'),['domicilio'=>$request->domicilio1,'latitud'=>$request->latitud1,'longitud'=>$request->longitud1]);


        if($request->domicilio2 != null){
        
            $establecimiento->Domicilio()->attach($request->get('localidad2'),['domicilio'=>$request->domicilio2,'latitud'=>$request->latitud2,'longitud'=>$request->longitud2]);
         }


         if($request->domicilio3 != null){
        
            $establecimiento->Domicilio()->attach($request->get('localidad3'),['domicilio'=>$request->domicilio3,'latitud'=>$request->latitud3,'longitud'=>$request->longitud3]);
         }


         if($request->domicilio4 != null){
        
            $establecimiento->Domicilio()->attach($request->get('localidad4'),['domicilio'=>$request->domicilio4,'latitud'=>$request->latitud4,'longitud'=>$request->longitud4]);
         }
        

    }//f*/

    function createEstablecimiento($request){
      
      $establecimiento = new Establecimiento();

      $establecimiento->nombre=$request->nombre;
      $establecimiento->tipo_id=$request->get('tipo');


      $establecimiento->save();
        
      $establecimiento = Establecimiento::find($establecimiento->id);

        foreach ($request->establecimientos as $domicilio) {
          
          $establecimiento->Domicilio()->attach($domicilio['localidad'],['domicilio'=>$domicilio['domicilio'],'latitud'=>$domicilio['latitud'],'longitud'=>$domicilio['longitud']]);

        }
        
        

 

    }
    public function detalleEstablecimiento($request){
      
        $establecimiento = Establecimiento::find($request->id);


        return $establecimiento;   
    }


   
   
}
