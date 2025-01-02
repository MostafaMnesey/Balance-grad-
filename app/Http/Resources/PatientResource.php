<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'adress' => $data[1]['adress'],
            'gender' => $data[1]['gender'],
            'date_of_birth' => $data[1]['date_of_birth'],
            'status' => $data[1]['status'],
            'Token' => $data[2],
        ];
    }
}
