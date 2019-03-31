<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AjaxService;
use Illuminate\Support\Facades\DB;
use App\Provincia;
use App\TipoEstablecimiento;
use App\Establecimiento;
use App\Http\Resources\EstablecimientoResource;

class AjaxController extends Controller
{
    protected $ajaxService;

    function __construct(AjaxService $ajaxService){
    	$this->ajaxService=$ajaxService;
    }

   
     public function buscarCiudadSegunProvincia(Request $request){

        return json_encode($this->ajaxService->buscarCiudadSegunProvincia($request));
  	}



  	public function buscarPorTipoEstablecimiento(Request $request){

        return $this->ajaxService->buscarPorTipoEstablecimiento($request);
  	}


}
