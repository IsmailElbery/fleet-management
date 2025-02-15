<?php

namespace App\Http\Resources;

use App\Models\Bus;
use App\Models\Station;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "seat_number" => $this->seat_number
        ];
    }


}
