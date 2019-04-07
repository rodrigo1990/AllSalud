<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Establecimiento;


class EspecialidadController extends Controller
{
    public function getEstablecimientosPorEspecialidad(Request $request){

    	$establecimientos = Establecimiento::all();


    	return json_encode($establecimientos);

    }
}
