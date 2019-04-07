<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table='especialidades';
	//protected $hidden = ['pivot'];
	public $timestamps = false;


     public function Establecimiento()
    {
        return $this->belongsToMany('App\Establecimiento','especialidades_establecimientos','especialidad_id','establecimiento_id');
    }


}
