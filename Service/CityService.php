<?php

namespace Modules\Location\Service;

use Modules\Location\Models\City;

class CityService
{

    public function Index($params)
    {
        $cities = City::
            when(isset($params['include_province']), function ($query) {
            $query->with(['province']);
        })
            ->when(isset($params['province_id']), function ($query) use($params) {
                $query->where('province_id', $params['province_id']);
            })
            ->get();

        return serviceOk($cities);
    }

}
