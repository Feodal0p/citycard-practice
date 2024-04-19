<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function create(): View
    {
        $user = Auth::user();
        return view('admin.index', compact('user'));
    }
}