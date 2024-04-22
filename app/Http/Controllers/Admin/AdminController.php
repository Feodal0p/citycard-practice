<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\City;
use App\Models\Transport;
use App\Models\Ticket;


class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index', [
            'cities' => City::All(),
            'transports' => Transport::All(),
            'tickets' => Ticket::All()
        ]);
    }
}