<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "LastName" => $this->LastName,
            "FirstName" => $this->FirstName,
            "FullName" => $this->FirstName." ".$this->LastName,
            "Version" => "1.1.1"
        ];
    }
}
