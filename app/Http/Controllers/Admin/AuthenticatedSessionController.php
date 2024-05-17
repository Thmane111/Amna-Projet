<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session(['admin_data' => Auth::guard('admin')->user()]);
        Alert::success('Bienvenue sur votre espace ');
        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

      $request->session()->forget('admin_data');


        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
}
