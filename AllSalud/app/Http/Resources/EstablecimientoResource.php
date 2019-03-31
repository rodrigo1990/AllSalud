<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\DAO\EstablecimientoDao;

class EstablecimientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $dao = new EstablecimientoDao();

         return[
            
            'id' => $this->id,
            'nombre' => $this->nombre,
            'asd' => $this->Domicilio,
            'provincias'=>$dao->getProvinciasPorEstablecimiento($this->id)

        ];
    
    }
}
