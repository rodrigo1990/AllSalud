<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
   protected $table='ciudades';




    public function Provincia(){
        return $this->belongsTo('AllSalud\Provincia');
    }

    public function Establecimientos(){
        return $this->belongsToMany('AllSalud\Establecimiento','establecimiento_ciudad','ciudad_id','establecimiento_id')->withPivot('domicilio');
    }


}
