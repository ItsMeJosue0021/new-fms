<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    private $userService;
    private $profileService;

    public function __construct(UserService $userService, ProfileService $profileService)
    {
        $this->userService = $userService;
        $this->profileService = $profileService;
    }
    /**
     * Display the user's profile form.
     */
    public function editUserProfile(): View
    {
        return view('profile.user', [
            'user' => auth()->user()
        ]);
    }

    public function editAdminProfile(): View {
        return view('profile.admin', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // try {
            $user_id = auth()->user()->id;
            $data = $request->validated();
            $this->userService->updateEmail($data['email'], $user_id);
            $this->profileService->updateProfile($data, $user_id);
            return redirect()->back()->with('success', 'Profile has been updated.');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Something went wrong while trying to update you profile. Please try again.');
        // }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
