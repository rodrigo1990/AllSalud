<?php

namespace App\DAO;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TipoEstablecimiento;

class TipoEstablecimientoDao 
{
    
	public function getTipos(){


		return TipoEstablecimiento::all();


	}
   
}
