<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'street' => $this->street,
            'apartment_num' => $this->apartment_num,
            'floor_num' => $this->floor_num,
            'is_primary_address' => $this->is_primary_address,
            ];
    }
}
