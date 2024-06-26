<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url = $this->checkUserRole();

        if ($request->session()->has('url.intended')) {
            return redirect()->intended($request->session()->get('url.intended'));
        }

        return redirect()->to($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function checkUserRole()
    {
        $userRole = auth()->user()->role->name;

        if ($userRole == 'admin') {
            $url = route('admin.dashboard');
        } elseif ($userRole == 'customer') {
            $url = route('home');
        } else {
            $url = route('unauthorized-access');
        }
        return $url;

    }
}
