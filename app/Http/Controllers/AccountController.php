<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ProfileService;
use App\Http\Requests\CreateAccountRequest;

class AccountController extends Controller
{
    private $profileService;
    private $userService;


    public function __construct(ProfileService $profileService, UserService $userService) {
        $this->profileService = $profileService;
        $this->userService = $userService;
    }

    public function createAccount(CreateAccountRequest $request) {

        $userCreationErrorMessage = 'An error occurred while creating your account, Please try again.';
        $data = $request->validated();

        $user = $this->userService->saveUser($data);
        if (!$user) {
            return redirect()->back()->with('error', $userCreationErrorMessage);
        }

        $profile = $this->profileService->saveProfile($data, $user->id);
        if (!$profile) {
            return redirect()->back()->with('error', $userCreationErrorMessage);
        }

        return redirect()->route('login')->with('message', 'Your account has been created. You can now login.');
    }
}
