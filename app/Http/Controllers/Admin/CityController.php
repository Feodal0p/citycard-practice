<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\City;
use App\Models\Ticket;
use App\Models\Transport;



class CityController extends Controller
{
    public function index(): View
    {
        return view('admin.cities.index', [
            'cities' => City::All(),
            'transports' => Transport::All(),
            'tickets' => Ticket::All()
        ]);
    }

    public function create(): View
    {
        return view('admin.cities.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'region' => 'required|string'
        ]);

        City::Create($data);
        
        return redirect()->route('admin.city.index');
    }

    public function edit(City $city): View
    {
        return view('admin.cities.edit',[
            'city' => $city,
        ]);
    }
    
    public function update(Request $request, City $city): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'region' => 'required|string'
        ]);
        $city->update($data);

        return redirect()->route('admin.city.index');
    }

    public function delete(City $city): RedirectResponse
    {
        $city->delete();
        return redirect()->route('admin.city.index');
    }
}