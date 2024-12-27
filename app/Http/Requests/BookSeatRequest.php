<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookSeatRequest extends CommonRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'seat_number' => 'required|exists:seats,seat_number',
            'start_station_id' => 'required|exists:stations,id',
            'end_station_id' => 'required|exists:stations,id',
            'trip_id' => 'required|exists:trips,id',
        ];
    }
}
