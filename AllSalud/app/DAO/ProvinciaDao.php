<?php

namespace App\DAO;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Provincia;

class ProvinciaDao 
{
    
	public function getProvincias(){


		return Provincia::all();


	}
   
}
