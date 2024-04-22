<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Card;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request): View
    {
        // dd(Cards::where('user_id', $request->user()->id)->get());
        return view('user.index', [
            'cards' => Card::where('user_id', $request->user()->id)->get(),
        ]);
    }
}