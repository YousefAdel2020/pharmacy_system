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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ["required", "max:255"],
            'email' => ["required", "max:255", "unique:pharmacies,email"],
            'national_id' => ["required", "unique:pharmacies,national_id"],
            'avatar' => 'file|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
