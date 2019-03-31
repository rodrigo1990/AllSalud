<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prueba;

class PruebaController extends Controller
{
    public function form(){
    	return view('prueba');
    }

    public function datos(Request $request){
    	
    	foreach($request->personas as $persona){
    		$prueba = new Prueba();
    		$prueba->campo1 = $persona['nombre'];
            $prueba->campo2= $persona['locaciones'];
            $prueba->campo3= $persona['tipo'];
    		$prueba->save();
    	}


        
        //return json_encode($request->personas);


    }//f
}
