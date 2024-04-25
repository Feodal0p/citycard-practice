<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'phone' => 'required|unique:users|regex:/^\+380\d{9}$/',
            'password' => 'required'
        ]);

        $user = User::Create($data);
        Auth::login($user);
        
        return redirect('/user');
    }
}
