<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\DAO\CiudadDao;

class CiudadService
{
    protected $ciudadDao;

    function __construct(CiudadDao $ciudadDao){
    	$this->ciudadDao=$ciudadDao;
    }


    public function getCiudadesPorProvincia($provincia_id){
    	return $this->ciudadDao->getCiudadesPorProvincia($provincia_id);
    }


    public function getCiudadPorId($ciudad_id){
    	return $this->ciudadDao->getCiudadPorId($ciudad_id);
    }

   
   
}
