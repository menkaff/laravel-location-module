<?php

namespace Modules\Location\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Location\Models\City;
use Modules\Location\Models\Province;

class LocationController extends Controller
{
    public function province_index()
    {
        return $provinces = Province::all();
    }

    public function city_index(Request $request)
    {
        return $cities = City::where('province_id', $request->province_id)->get();
    }
}
