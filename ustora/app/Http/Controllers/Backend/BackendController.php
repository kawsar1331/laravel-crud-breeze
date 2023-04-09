<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;




class BackendController extends Controller
{

    //Admin Login 
    public function loginpage() {
        return view('backend.login');
    }
    // Handle an incoming authentication request
   public function adminlogin(LoginRequest $request): RedirectResponse
   {
       $request->authenticate();

       $request->session()->regenerate();

       return redirect()->intended(RouteServiceProvider::HOME);
   }

    //Admin Logout
    // Destroy an authenticated session.
    public function adminlogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
