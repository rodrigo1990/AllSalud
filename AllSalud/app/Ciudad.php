<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
   protected $table='ciudades';


    public function Provincia(){
        return $this->belongsTo('AllSalud\Provincia');
    }
}
