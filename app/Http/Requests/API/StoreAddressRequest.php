<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'street' => ["required" , "max:255"],
            'apartment_num' => ["required" , "numeric" , "max:999" , "min:1"],
            'floor_num' => ["required" , "numeric" , "max:40" , "min:1"],
            'is_primary_address' => ["required","numeric"],
            'area_id' => ["numeric","exists:areas,id"],
            'user_id' => ["numeric","exists:users,id"],
            'client_id' => ["numeric","exists:users,id"],
        ];
    }
}
