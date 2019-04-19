<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EstablecimientoService;
use App\Services\ProvinciaService;
use App\Services\TipoEstablecimientoService;
use App\Services\EspecialidadService;
use App\Services\SessionService;
use App\Provincia;
use App\TipoEstablecimiento;
use App\Establecimiento;
use App\Ciudad;
use App\Http\Resources\EstablecimientoResource;
use App\Http\Controllers\FrontController;



class EstablecimientoController extends Controller
{
    protected $establecimientoService;
    protected $provinciaService;
    protected $tipoEstablecimientoService;
    protected $especialidadService;
    protected $sessionService;

    function __construct(EstablecimientoService $establecimientoService,ProvinciaService $provinciaService,TipoEstablecimientoService $tipoEstablecimientoService,SessionService $sessionService,EspecialidadService $especialidadService ){

    	$this->establecimientoService=$establecimientoService;

      $this->provinciaService = $provinciaService;

      $this->tipoEstablecimientoService=$tipoEstablecimientoService;

      $this->especialidadService = $especialidadService;

      $this->sessionService = $sessionService;

    }

     public function altaEstablecimiento(Request $request){

        $provincias = $this->provinciaService->getProvincias();
     	  $tipos = $this->tipoEstablecimientoService->getTipos();
        $especialidades = $this->especialidadService->getEspecialidades();
        $session = $this->sessionService->accessSessionData();

        if($request->estado)
          $estado = $request->estado;
        else
          $estado = "false";
        


        if($session=="true")
          return view('admin/altaEstablecimiento',compact('provincias','tipos','estado','especialidades'));
        else
          return "No esta autenticado en la aplicacion";
    }


    public function getEstablecimientos(){

        $establecimiento = $this->establecimientoService->getEstablecimientos();
        $establecimientos = EstablecimientoResource::collection($establecimiento);
         $session = $this->sessionService->accessSessionData();
         //return  json_encode($establecimientos);

         if($session=="true")
            return view('admin/getEstablecimientos',['establecimientos'=>$establecimientos]);
          else 
            return "No esta autenticado en la aplicacion";
        //return $establecimientos;
    }



    public function createEstablecimiento(Request $request){

       $session = $this->sessionService->accessSessionData();

      if($session=="true"){
        $this->establecimientoService->createEstablecimiento($request);
          return redirect()->action('EstablecimientoController@altaEstablecimiento',['estado'=>'true']);
      }
      else{
       return "No esta autenticado en la aplicacion";
      }

    }


    public function detalleEstablecimiento(Request $request){
      
      $establecimiento =   $this->establecimientoService->detalleEstablecimiento($request);
      
      $provincias = $this->provinciaService->getProvincias();
      
      $tipos = $this->tipoEstablecimientoService->getTipos();

      $especialidades = $this->especialidadService->getEspecialidades();

      $session = $this->sessionService->accessSessionData();

       if($session=="true")
          return view('admin/detalleEstablecimiento',compact('establecimiento','provincias','tipos','especialidades'));
        else 
          return "No esta autenticado en la aplicacion";

    }


    public function updateEstablecimiento(Request $request){

      $session = $this->sessionService->accessSessionData();


        $this->establecimientoService->updateEstablecimiento($request);
        if($session=="true")
         return redirect()->action('EstablecimientoController@detalleEstablecimiento', ['id' => $request->id]);
       else
        return "No esta autenticado en la aplicacion";

    }


    




}
