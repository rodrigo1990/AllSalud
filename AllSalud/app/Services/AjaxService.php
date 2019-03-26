<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\DAO\AjaxDao;

class AjaxService
{
    protected $ajaxDao;

    function __construct(AjaxDao $ajaxDao){
    	$this->ajaxDao=$ajaxDao;
    }

   
     public function buscarCiudadSegunProvincia($request){

        return $this->ajaxDao->buscarCiudadSegunProvincia($request);


  }
}
