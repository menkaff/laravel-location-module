<?php

namespace Modules\Location\Http\Controllers\WEB;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Location\Service\CityService;

class CityController extends Controller
{
    public function Index(Request $request)
    {

        $city_service = new CityService;

        $data = $request->all();

        $result = $city_service->index($data);
        if ($result['is_successful']) {
            return $result['data'];
        } else {
            return $result['message'];

        }
    }

}
