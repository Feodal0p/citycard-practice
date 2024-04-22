<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\City;



class CityController extends Controller
{
    public function create(): View
    {
        return view('admin.cities.create');
    }

    public function store(Request $request, City $city): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'region' => 'required|string'
        ]);

        $city = City::Create($data);
        
        return redirect()->route('admin.index');
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
            'name' => 'nullable|string',
            'region' => 'nullable|string'
        ]);
        $city->update($data);

        return redirect()->route('admin.index');
    }

    public function delete(City $city): RedirectResponse
    {
        $city->delete();
        return redirect()->route('admin.index');
    }
}