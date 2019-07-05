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


	public function getProvinciasAsignadasEstablecimiento(){
		return DB::table('provincias AS p1')
					->whereExists(function ($query) {
	                    $query->select(DB::raw(1))
                            ->from('domicilios')
                            ->join('ciudades','ciudades.id','domicilios.ciudad_id')
                            ->join('provincias AS p2','ciudades.provincia_id','p2.id')
                            ->whereRaw('p1.id = p2.id');
                  	})
                  	->get();
	}
   
}
