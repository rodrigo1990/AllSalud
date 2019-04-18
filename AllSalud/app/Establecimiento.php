<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    protected $table='establecimientos';
	//protected $hidden = ['pivot'];
	public $timestamps = false;
    protected $fillable = ['domicilio'];


     public function Domicilio()
    {
        return $this->hasMany('App\Domicilio');
    }


    public function Tipo(){
    	return $this->belongsToMany('App\TipoEstablecimiento','tipo_establecimiento_establecimiento','establecimiento_id','tipo_id')->withPivot('id');
    }


    public function Especialidad()
    {
        return $this->belongsToMany('App\Especialidad','especialidades_establecimientos','establecimiento_id','especialidad_id')->withPivot('id');
    }


    public function Ciudad()
    {
        return $this->hasManyThrough('App\Ciudad', 'App\Domicilio');
    }



    
}
