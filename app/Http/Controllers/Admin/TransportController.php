<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\City;
use App\Models\Transport;


class TransportController extends Controller
{
    public function index(City $city, Transport $transports): View
    {
        dd($city->transports()->get());
            return view('admin.transports.index',[
                'city' => $city,
                'transports' => $transports->where('city_id', $city->id)
            ]);
    }
}