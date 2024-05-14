<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentSupportingDocumentController extends Controller
{
    public function store() {
        $data = request()->validate([
            'file' => 'required|file',
        ]);

        $path = $data['file']->store('payment_supporting_documents');

        auth()->user()->paymentSupportingDocuments()->create([
            'file' => $path,
        ]);

        return back();
    }
}
