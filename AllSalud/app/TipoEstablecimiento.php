<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstablecimiento extends Model
{
    protected $table='tipo_establecimientos';
	


	public function Establecimiento(){
    	return $this->hasMany('App/Establecimiento');
    }

}
