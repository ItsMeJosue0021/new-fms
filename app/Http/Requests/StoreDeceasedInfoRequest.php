<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeceasedInfoRequest extends FormRequest
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
            'dob' => 'required|date',
            'age' => 'required|integer|min:0',
            'sex' => 'required|in:Male,Female',
            'height' => 'nullable|string',
            'weight' => 'nullable|string',
            'occupation' => 'nullable|string|max:255',
            'citizenship' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'civil_status' => 'nullable|string|max:255',
            'fathers_name' => 'nullable|string|max:255',
            'mother_maiden_name' => 'nullable|string|max:255',
            'birth_place' => 'nullable|string|max:255',
            'lot_block' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'brgy' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'death_time' => 'required|date_format:H:i',
            'death_date' => 'required|date',
            'death_cause' => 'required|string|max:255',
            'death_place' => 'nullable|string',
            'cementery_address' => 'nullable|string|max:255',
            'viewing_place' => 'nullable|string|max:255',
            'internment_time' => 'required|date_format:H:i',
            'internment_date' => 'required|date',
            'other_occupation' => 'nullable',
            'other_religion' => 'nullable',
            'other_citizenship' => 'nullable',
            'other_death_cause' => 'nullable',
        ];
    }
}
