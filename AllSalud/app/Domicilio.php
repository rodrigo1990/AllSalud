<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $table='domicilios';
	//protected $hidden = ['pivot'];
	public $timestamps = false;
	protected $fillable = ['domicilio','latitud','longitud','telefono','ciudad_id','establecimiento_id'];


     public function Establecimiento()
    {
        return $this->belongsTo('App\Establecimiento');
    }

    public function Tipo(){
    	return $this->belongsToMany('App\Domicilio','tipo_establecimiento_domicilio','domicilio_id','tipo_id')->withPivot('id');
    }


}
