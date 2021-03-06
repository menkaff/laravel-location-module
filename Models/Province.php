<?php
namespace Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location_province';

    public function city()
    {
        return $this->hasMany('Modules\Location\Models\City','province_id');
    }

}
