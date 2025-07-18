<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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

            'code' => ['min:4', 'max:255', 'string'],
            'name' => ['string', 'min:4', 'max:255'],
            'total' => ['integer', 'min:0'],
            'price' => ['numeric', 'min:0'],
        ];
    }
}
