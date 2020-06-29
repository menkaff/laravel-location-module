<?php

namespace Modules\Location\Service;

use Modules\Location\Models\Province;

class ProvinceService
{

    public function Index($params)
    {
        $provinces = Province::
            when(isset($params['include_city']), function ($query) {
            $query->with(['city']);
        })
            ->get();

        return serviceOk($provinces);
    }

}
