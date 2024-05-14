<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;

class MessageController extends Controller
{
    public function index() {
        return view('messages.index',[
            'messages' => Message::latest()->filter(Request(['search']))->paginate(9)
        ]);
    }

    public function store(StoreMessageRequest $request) {
        try {
            Message::create($this->toMessageArray($request->validated()));
            return back()->with('success', 'We have received your message, we will get back to you soon.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, please try again.');
        }
    }

    public function toMessageArray($data) {
        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message']
        ];
    }

    public function show($message_id) {
        try {
            return view('messages.show', [
                'message' => Message::findOrFail($message_id)
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Message not found. Please try again.');
        }
    }

    public function delete($message_id) {
        try {
            Message::findOrFail($message_id)->delete();
            return back()->with('success', 'Message deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, please try again.');
        }
    }

}
