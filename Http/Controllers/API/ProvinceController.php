<?php

namespace Modules\Location\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Location\Service\ProvinceService;

class ProvinceController extends Controller
{
    public function Index(Request $request)
    {
        $province_service = new ProvinceService;

        $data = $request->all();

        $result = $province_service->Index($data);
        if ($result['is_successful']) {
            return responseOk($result['data']);
        } else {
            return responseError($result['message']);

        }
    }

}
