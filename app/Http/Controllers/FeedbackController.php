<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFeedbackRequest;

class FeedbackController extends Controller
{

    public function visibleFeedbacks() {
        return view('feedback.index', [
            'feedbacks' => Feedback::where('show_on_website', true)->latest()->paginate(9)
        ]);
    }


    public function store(StoreFeedbackRequest $request, $service_request_id)
    {
        try {
            $data = $request->validated();
            Feedback::create($this->toFeedbackArray($data, $request->service_request_id));
            return back()->with('success', 'Thank you for your feedback!');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while saving your feedback');
        }
    }

    public function toFeedbackArray($data, $service_request_id)
    {
        $user = auth()->user();
        return [
            'service_request_id' => $service_request_id,
            'name' => $user->profile ? $user->profile->fullName() : 'Anonymous',
            'content' => $data['content'],
            'stars' => $data['stars'],
        ];
    }

    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(9);
        return view('feedback.index', [
            'feedbacks' => $feedbacks,
        ]);
    }

    public function visible($id) {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->update(['show_on_website' => true]);
            return back()->with('success', 'Feedback is now visible');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while making feedback visible');
        }
    }

    public function hidden($id) {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->update(['show_on_website' => false]);
            return back()->with('success', 'Feedback is now hidden');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while making feedback hidden');
        }
    }

    public function delete($id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->delete();
            return back()->with('success', 'Feedback deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting feedback');
        }
    }
}
