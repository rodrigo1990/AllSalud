<?php

namespace App\Services;

use Illuminate\Http\Request;

class SessionService
{

   protected $sessionRequest;


   function __construct(Request $sessionRequest){
      $this->sessionRequest=$sessionRequest;
    }


    public function accessSessionData() {

      if($this->sessionRequest->session()->has('user'))
         return "true";
      else
         return "false";
   
   }


   public function storeSessionData($request) {

      $this->sessionRequest->session()->put('user', $request->username);

      return "Data has been added to session";

   }


   public function deleteSessionData() {

      $this->sessionRequest->session()->forget('user');

      return "true";
      
   }


}
