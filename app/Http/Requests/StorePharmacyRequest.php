<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePharmacyRequest extends FormRequest
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
            'name' => [ "max:255"],
            'email' => ["max:255", "unique:pharmacies,email,$this->email"],
            'national_id' => [ "unique:pharmacies,national_id"],
            'avatar' => 'file|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
