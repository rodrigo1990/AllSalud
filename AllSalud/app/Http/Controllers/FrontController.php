<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ProvinciaService;
use App\Services\TipoEstablecimientoService;
use App\Services\EspecialidadService;

use App\Provincia;
use App\TipoEstablecimiento;
use App\Especialidad;

class FrontController extends Controller
{

    protected $provinciaService;
    protected $tipoEstablecimientoService;
    protected $especialidadService;

    function __construct(ProvinciaService $provinciaService,TipoEstablecimientoService $tipoEstablecimientoService,EspecialidadService $especialidadService ){


      $this->provinciaService = $provinciaService;

      $this->tipoEstablecimientoService=$tipoEstablecimientoService;

      $this->especialidadService = $especialidadService;


    }


    public function index()
    {	

        $provincias = $this->provinciaService->getProvincias();
        
        $provinciasAsignadasEstablecimiento = $this->provinciaService->getProvinciasAsignadasEstablecimiento();

        $tipos =$this->tipoEstablecimientoService->getTipos();
        
        $especialidadesAsignadasEstablecimiento = $this->especialidadService->getEspecialidadesAsignadasEstablecimiento();



        return view('index',compact('provincias','tipos','especialidadesAsignadasEstablecimiento','provinciasAsignadasEstablecimiento'));
    }


    public function indexAdmin()
    {	
    	
    	
        return view('admin/index');
    }

    public function adminHome(){
        return view('admin/home');
    }


   
}
