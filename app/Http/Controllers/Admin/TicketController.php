<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\City;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index(City $city): View
    {
            return view('admin.tickets.index',[
                'city' => $city,
                'tickets' => $city->tickets()->get()
            ]);
    }

    public function create(City $city): View
    {
        return view('admin.tickets.create',[
            'city' => $city
        ]);
    }

    public function store(Request $request, City $city): RedirectResponse
    {
        $request->validate([
            'type' => 'required|string',
            'transport_type' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $ticket = new Ticket();
        $ticket->city_id = $city->id;
        $ticket->type = $request->type;
        $ticket->transport_type = $request->transport_type;
        $ticket->price = $request->price;
        $ticket->save();
        
        return redirect()->route('admin.ticket.index',[
            'city' => $city
        ]);
    }

    public function edit(City $city, Ticket $ticket): View
    {
        return view('admin.tickets.edit',[
            'city' => $city,
            'ticket' => $ticket,
        ]);
    }

    public function update(Request $request, City $city, Ticket $ticket): RedirectResponse
    {
        $data = $request->validate([
            'type' => 'required|string',
            'transport_type' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $ticket->update($data);

        return redirect()->route('admin.ticket.index', [
            'city' => $city,
        ]);
    }

    public function delete(City $city, Ticket $ticket): RedirectResponse
    {
        $ticket->delete();
        return redirect()->route('admin.ticket.index',[
            'city' => $city,    
        ]);
    }
}
