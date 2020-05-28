<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddStore extends Model
{
    protected $fillable = [
        'tsnef','store_name','store_mobile','store_address',
        'Governorate','City','logo','long_map','lat_map'
    ];
}
