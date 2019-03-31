<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\DAO\ProvinciaDao;

class ProvinciaService
{
    protected $provinciaDao;

    function __construct(ProvinciaDao $provinciaDao){
    	$this->provinciaDao=$provinciaDao;
    }



    public function getProvincias(){
    	return $this->provinciaDao->getProvincias();
    }




   
   
}
