<?php

namespace App\Http\Controllers;

use App\Models\CondolencesMessage;
use Illuminate\Http\Request;

class CondolencesMessageController extends Controller
{
    public function index() {
        return view('condolences-message.index', [
            'message' => CondolencesMessage::first()
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'message' => 'required|string'
        ]);

        try {
            $condolencesMessage = CondolencesMessage::findOrFail($id);
            $condolencesMessage->message = $data['message'];
            $condolencesMessage->save();
            return redirect()->back()->with('success', 'Message has been updated!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }

    }
}
