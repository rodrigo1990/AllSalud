<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ValidationService;

class ValidationController extends Controller
{
	protected $validationService;

    function __construct(ValidationService $validationService){
    	$this->validationService=$validationService;
    }
    
	public function login(Request $request){


		$msj = $this->validationService->login($request);

		return $msj;

	}



}
