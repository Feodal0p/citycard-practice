<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\TransactionHistory;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        return view('user.index', [
            'cards' => $request->user()->cards()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $card = new Card();
        $card->user_id = $request->user()->id;
        $card->type = 'Звичайний';
        $card->balance = 0;
        do {
            $card->number = fake()->numerify('#####-#####-#');
        } while(Card::where('number', $card->number)->count() == 1);
        $card->save();
        return redirect()->route('user.index');
    }

    public function usage(Card $card): View
    {
        return view('user.usage', [
            'card' => $card,
            'usages' => $card->transaction()->where('type', TransactionHistory::TYPE_USAGE)->get(),
        ]);
    }

    public function charge(Card $card): View
    {
        return view('user.charge', [
            'card' => $card,
            'charges' => $card->transaction()->where('type', TransactionHistory::TYPE_CHARGE)->get(),
        ]);
    }
}
