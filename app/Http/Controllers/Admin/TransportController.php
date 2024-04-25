<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Transport;

class TransportController extends Controller
{
    public function index(City $city): View
    {
            return view('admin.transports.index',[
                'city' => $city,
                'transports' => $city->transports()->get()
            ]);
    }

    public function create(City $city): View
    {
        return view('admin.transports.create',[
            'city' => $city
        ]);
    }

    public function store(Request $request, City $city): RedirectResponse
    {
        $request->validate([
            'transport_type' => 'required|string',
            'route_number' => 'required|integer',
            'route_description' => 'required|string',
        ]);

        $transport = new Transport();
        $transport->city_id = $city->id;
        $transport->transport_type = $request->transport_type;
        $transport->route_number = $request->route_number;
        $transport->route_description = $request->route_description;
        $transport->save();
        
        return redirect()->route('admin.transport.index',[
            'city' => $city
        ]);
    }

    public function edit(City $city, Transport $transport): View
    {
        return view('admin.transports.edit',[
            'city' => $city,
            'transport' => $transport,
        ]);
    }

    public function update(Request $request, City $city, Transport $transport): RedirectResponse
    {
        $data = $request->validate([
            'transport_type' => 'required|string',
            'route_number' => 'required|integer',
            'route_description' => 'required|string',
        ]);
        $transport->update($data);

        return redirect()->route('admin.transport.index', [
            'city' => $city,
        ]);
    }
    public function delete(City $city, Transport $transport): RedirectResponse
    {
        $transport->delete();
        return redirect()->route('admin.transport.index',[
            'city' => $city,    
        ]);
    }
}
