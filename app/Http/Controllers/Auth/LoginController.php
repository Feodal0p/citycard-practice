<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'phone' => 'required',
            'password' => 'required'

        ]);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            if(Auth::user()->role !== User::ROLE_ADMIN){
                return redirect('/user');
            } 
            else
            return redirect('/admin/cities');
        }
        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ])->onlyInput('phone');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect('/login');
    }    
}