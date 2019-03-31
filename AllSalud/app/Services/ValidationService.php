<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\DAO\ValidationDao;

class ValidationService
{
    protected $validationDao;

    function __construct(ValidationDao $validationDao){
    	$this->validationDao=$validationDao;
    }


    public function login($request){
    	return $this->validationDao->login($request);
    }

   
   
}
