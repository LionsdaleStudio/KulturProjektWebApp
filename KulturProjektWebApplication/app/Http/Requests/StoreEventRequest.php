<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:5',
            'start' => 'required|date',
            'shortDescription' => 'required|string|max:255',
            'longDescription' => 'required|string',
            'thumbnail' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Kérlek add meg az esemény nevét!',
        ];
    }
}
