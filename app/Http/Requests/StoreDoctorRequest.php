<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDoctorRequest extends FormRequest
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
            'name' => ["required", "max:255"],
            'password' => ["required", "max:255", "min:6"],
            'email' => 'required|unique:users,email',
            'national_id' => 'required|unique:doctors,national_id',
            'avatar' => 'file|mimes:jpeg,png,jpg|max:2048'

        ];
    }
}
