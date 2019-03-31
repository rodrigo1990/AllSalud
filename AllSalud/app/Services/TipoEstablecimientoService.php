<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\DAO\TipoEstablecimientoDao;

class TipoEstablecimientoService
{
    protected $tipoEstablecimientoDao;

    function __construct(TipoEstablecimientoDao $tipoEstablecimientoDao){
    	$this->tipoEstablecimientoDao=$tipoEstablecimientoDao;
    }



    public function getTipos(){
    	return $this->tipoEstablecimientoDao->getTipos();
    }




   
   
}
