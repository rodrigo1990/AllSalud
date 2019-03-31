<?php

namespace App\DAO;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class ValidationDao 
{
    
	public function login($request){

		$exist = User::where('email',$request->username)
				  		->where('password',md5($request->password))
    				  	->exists();


    	if($exist==true)
    		return "true";
    	else
    		return "false";

    	



	}
   


  }

