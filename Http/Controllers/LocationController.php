<?php

namespace Modules\Location\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Location\Models\Province;
use Modules\Location\Models\City;

class LocationController extends Controller
{
    public function list_province()
    {
        return $provinces=Province::all();
    }

    public function list_city(Request $request)
    {
        return $cities=City::where('province_id',$request->province_id)->get();
    }
}
