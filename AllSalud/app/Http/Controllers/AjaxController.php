<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AjaxService;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    protected $ajaxService;

    function __construct(AjaxService $ajaxService){
    	$this->ajaxService=$ajaxService;
    }

   
     public function buscarCiudadSegunProvincia(Request $request){

        return json_encode($this->ajaxService->buscarCiudadSegunProvincia($request));


  }
}
