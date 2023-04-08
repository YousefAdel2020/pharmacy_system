<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = auth()->user();

        return [
            'name' => ["required", "max:255"],
            'password' => ["required", "max:255", "min:6"],
            'email' => ["required", "max:255", Rule::unique('users')->ignore($userId),],
        ];
    }
}
