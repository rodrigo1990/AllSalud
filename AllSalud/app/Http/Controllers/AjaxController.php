<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AjaxService;
use App\Services\SessionService;
use Illuminate\Support\Facades\DB;
use App\Provincia;
use App\TipoEstablecimiento;
use App\Establecimiento;
use App\Http\Resources\EstablecimientoResource;

class AjaxController extends Controller
{
    protected $ajaxService;
    protected $sessionService;

    function __construct(AjaxService $ajaxService,SessionService $sessionService){
    	$this->ajaxService=$ajaxService;
      $this->sessionService=$sessionService;
    }

   
     public function buscarCiudadSegunProvincia(Request $request){

        return json_encode($this->ajaxService->buscarCiudadSegunProvincia($request));
  	}


    public function buscarEstablecimientoPorTipoProvinciaCiudadEspecialidad(Request $request){

      return $this->ajaxService->buscarEstablecimientoPorTipoProvinciaCiudadEspecialidad($request);
      
    }

    public function buscarCiudadesAsignadasEstablecimientoSegunProvincia(Request $request){

        return json_encode($this->ajaxService->buscarCiudadesAsignadasEstablecimientoSegunProvincia($request));
    }

    

    public function deleteEstablecimiento(Request $request){
      return json_encode($this->ajaxService->deleteEstablecimiento($request));
    }


    public function deleteLocacion(Request $request){
      return json_encode($this->ajaxService->deleteLocacion($request));
    }

    public function existeSesion(Request $request){
      return json_encode($this->sessionService->accessSessionData());
    }


}
