<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\DAO\EspecialidadDao;

class EspecialidadService
{
    protected $especialidadDao;

    function __construct(EspecialidadDao $especialidadDao){
    	$this->especialidadDao=$especialidadDao;
    }



    public function getEspecialidades(){
      return $this->especialidadDao->getEspecialidades();
    }

   
   
}
