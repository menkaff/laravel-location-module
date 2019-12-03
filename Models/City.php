<?php
namespace Modules\Location\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location_city';
    public function province()
    {
        return $this->belongsTo('Modules\Location\Models\Province');
    }

}
