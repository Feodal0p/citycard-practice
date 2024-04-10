<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cards;

class IndexController extends Controller
{
    public function __invoke(){
        $user = Auth::user();
        $cards = Cards::where('user_id', $user['id'])->get()->toArray();
        return view('user.index', compact('user', 'cards'));
    }
}