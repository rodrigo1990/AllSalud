<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ValidationService;
use App\Services\SessionService;

class ValidationController extends Controller
{
	protected $validationService;
	protected $sessionService;

    function __construct(ValidationService $validationService,SessionService $sessionService){
    	$this->validationService=$validationService;
    	$this->sessionService = $sessionService;
    }
    
	public function login(Request $request){


		$msj = $this->validationService->login($request);

		if($msj == "true"){
			$this->sessionService->storeSessionData($request);
			return $msj;
		}else{
			return $msj;
		}

	}

	public function logout(){
		return	$this->sessionService->deleteSessionData();
	}



}
