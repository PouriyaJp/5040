<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'consultant' => new ConsultantResource($this->whenLoaded('consultant')),
            'client' => new ClientResource($this->whenLoaded('client')),
            'appointment_time' => $this->appointment_time,
        ];
    }
}
