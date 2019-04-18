<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstablecimiento extends Model
{
    protected $table='tipo_establecimientos';
	


	public function Domicilio(){

    	return $this->belongsToMany('App/Domicilio','tipo_establecimiento_domicilio','tipo_id','domicilio_id')->withPivot('id');
    
    }

}
