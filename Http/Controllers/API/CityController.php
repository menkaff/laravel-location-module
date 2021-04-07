<?php

namespace Modules\Location\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Location\Service\CityService;

/**
 * @group  Location
 *
 * APIs for Location Public
 */
class CityController extends Controller
{
    /**
     * City Index
     * @urlParam province_id . Example:1
     */
    public function Index(Request $request)
    {
        $city_service = new CityService;

        $data = $request->all();

        $result = $city_service->index($data);
        if ($result['is_successful']) {
            return responseOk($result['data']);
        } else {
            return responseError($result['message']);
        }
    }
}
