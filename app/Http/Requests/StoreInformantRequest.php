<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInformantRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'dob' => 'required|date',
            'occupation' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'telephone' => 'nullable|string',
            'mobilephone' => 'required|string',
            'relationship_to_deceased' => 'required|string|max:255',
            'other_occupation' => 'nullable',
            'other_relationship_to_deceased' => 'nullable',
        ];
    }
}
