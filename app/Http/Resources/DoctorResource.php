<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
   
        return [
            'id' => $data[0]['id'],
            'name' => $data[0]['name'],
            'email' => $data[0]['email'],
            'type' => $data[0]['type'],
            'profile_picture' => $data[0]['profile_picture'],
            'phone_number' => $data[1]['phone_number'],
            'specialization' => $data[1]['specialization'],
            'license_number' => $data[1]['license_number'],
            'Token' => $data[2],


        ];
    }
}
