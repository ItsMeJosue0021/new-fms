<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentInforRequest extends FormRequest
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
            'payment_method' => 'required',
            'payment_reference' => 'nullable',
            'discount_amount' => 'nullable',
            'recieved_amount' => 'required',
            'gl' => 'nullable',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'balance_payment' => 'nullable',
            'official_receipt_serial'  => 'nullable',
            'payment_document'  => 'nullable',
            'rb' => 'nullable|string',
            'driver_on_duty' => 'nullable|string',
            'helper_on_duty' => 'nullable|string',
            'arrival_date' => 'nullable|date',
            'arrival_time' => 'nullable|date_format:H:i',
            'l_remark' => 'nullable|string',
            'w_rmark' => 'nullable|string',
        ];
    }
}
