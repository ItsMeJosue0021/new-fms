<?php

namespace App\Http\Controllers;

use App\Models\PaymentTerm;
use Illuminate\Http\Request;

class PaymentTermController extends Controller
{
    public function index() {
        return view('payment-terms.index', [
            'term' => PaymentTerm::first()
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'memorial' => 'required|string',
            'cremation' => 'required|string',
            'lowertext' => 'required|string'
        ]);

        try {
            $paymentTerm = PaymentTerm::findOrFail($id);
            $paymentTerm->update([
                'memorial' => $data['memorial'],
                'cremation' => $data['cremation'],
                'lowertext' => $data['lowertext']
            ]);
            return redirect()->back()->with('success', 'Terms have been updated!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
