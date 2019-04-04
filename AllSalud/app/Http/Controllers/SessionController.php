<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SessionService;

class SessionController extends Controller
{

   protected $sessionService;

    function __construct(SessionService $sessionService){
      $this->sessionService=$sessionService;
    }


    public function accessSessionData(Request $request) {

      if($request->session()->has('my_name'))
         echo $request->session()->get('my_name');
      else
         echo 'No data in the session';
   
   }


   public function storeSessionData(Request $request) {

      $this->sessionService->storeSessionData($request->username);

      echo "Data has been added to session";

   }


   public function deleteSessionData(Request $request) {

      $request->session()->forget('my_name');

      echo "Data has been removed from session.";
      
   }


}
