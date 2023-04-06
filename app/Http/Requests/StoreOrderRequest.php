<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
        $size = $this->input("medicine_ids") ? count($this->input("medicine_ids")) : 0;


        return [
            'medicine_ids' => ['required'],
            'qty' => ['required', 'size:' . $size],
        ];
    }

    public function messages(): array
    {
        return [
            'qty.size' => 'Please Provide A Quantity For Each Medicine ',
            'qty.required' => 'Please Check Your quantity Field is required',
            'medicine_ids.required' => 'Please Check Your Medicine Field is required',
            'medicine_ids.exists' => 'Please Create Medicine First',
        ];
    }
}
