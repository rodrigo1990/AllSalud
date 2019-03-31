<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\DAO\EstablecimientoDao;

class EstablecimientoService
{
    protected $establecimientoDao;

    function __construct(EstablecimientoDao $establecimientoDao){
    	$this->establecimientoDao=$establecimientoDao;
    }


   /* public function createEstablecimiento($request){
    	$this->establecimientoDao->createEstablecimiento($request);
    }*/
    public function createEstablecimiento($request){
        return   $this->establecimientoDao->createEstablecimiento($request);
    }


     public function detalleEstablecimiento($request){
      return  $this->establecimientoDao->detalleEstablecimiento($request);   
    }


   
   
}
