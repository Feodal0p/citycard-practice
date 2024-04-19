<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cards;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request): View
    {
        $user = Auth::user();
        $cards = Cards::where('user_id', $user['id'])->get()->toArray();
        return view('user.index', compact('user', 'cards'));
    }
}