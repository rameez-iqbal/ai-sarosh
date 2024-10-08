<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('frontend.login.login');
    }

    public function loginRoute()
    {
        return to_route('login.view');
    }

    public function login ( Request $request )
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        try {
            if (Auth::attempt($credentials)) {
                return redirect()->route('pages');

            } else {
                return redirect()->route('login.view')->withErrors([
                    'email' => 'These credentials do not match our records.',
                ]);
            }
        } catch (\Exception $ex) {
            Log::error("LoginController Error: " . $ex->getMessage());
            return redirect()->route('login.view')->withErrors([
                'email' => 'An error occurred during login. Please try again later.',
            ]);
        }
    }

    public function dashboardView()
    {
        return redirect()->route('pages');
        // return view('admin-panel.dashboard.dashboard');    
    }
}
