<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    protected $table='establecimientos';
	//protected $hidden = ['pivot'];
	public $timestamps = false;


     public function Domicilio()
    {
        return $this->belongsToMany('App\Ciudad','establecimiento_ciudad','establecimiento_id','ciudad_id')->withPivot('domicilio','id','latitud','longitud');
    }


    public function Tipo(){
    	return $this->belongsTo('App\TipoEstablecimiento','tipo_id');
    }


    public function Especialidad()
    {
        return $this->belongsToMany('App\Especialidad','especialidades_establecimientos','establecimiento_id','especialidad_id')->withPivot('id');
    }



    
}
