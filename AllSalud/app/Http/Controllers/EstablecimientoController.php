<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EstablecimientoService;
use App\Services\ProvinciaService;
use App\Services\TipoEstablecimientoService;
use App\Provincia;
use App\TipoEstablecimiento;
use App\Establecimiento;
use App\Ciudad;
use App\Http\Resources\EstablecimientoResource;



class EstablecimientoController extends Controller
{
    protected $establecimientoService;
    protected $provinciaService;
    protected $tipoEstablecimientoService;

    function __construct(EstablecimientoService $establecimientoService,ProvinciaService $provinciaService,TipoEstablecimientoService $tipoEstablecimientoService){

    	$this->establecimientoService=$establecimientoService;

      $this->provinciaService = $provinciaService;

      $this->tipoEstablecimientoService=$tipoEstablecimientoService;

    }

     public function altaEstablecimiento(){

     	$provincias = Provincia::all();
     	$tipos = TipoEstablecimiento::All();

        return view('admin/altaEstablecimiento',compact('provincias','tipos','ciudades'));
    }


    public function eliminarEstablecimiento(){

        $establecimiento = Establecimiento::all();
        $establecimientos = EstablecimientoResource::collection($establecimiento);
         //return  json_encode($establecimientos);

         return view('admin/eliminarEstablecimiento',['establecimientos'=>$establecimientos]);
    
        //return $establecimientos;
    }




    /*public function createEstablecimiento(Request $request){
    	$this->establecimientoService->createEstablecimiento($request);
    }*/

    public function createEstablecimiento(Request $request){
     return  $this->establecimientoService->createEstablecimiento($request);
    }


    public function detalleEstablecimiento(Request $request){
      
      $establecimiento =   $this->establecimientoService->detalleEstablecimiento($request);
      
      $provincias = $this->provinciaService->getProvincias();
      
      $tipos = $this->tipoEstablecimientoService->getTipos();
      
      return view('admin/detalleEstablecimiento',compact('establecimiento','provincias','tipos','ciudades'));   
    }




}
