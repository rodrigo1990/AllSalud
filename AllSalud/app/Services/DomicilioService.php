<?php

namespace App\Services;

use App\DAO\DomicilioDao;
use Illuminate\Http\Request;


class DomicilioService
{
    protected $domicilioDao;

    function __construct(DomicilioDao $domicilioDao){
    	$this->domicilioDao=$domicilioDao;
    }


    public function getTipoPorDomicilio($id){
    	return $this->domicilioDao->getTipoPorDomicilio($id);
    }




   
   
}
