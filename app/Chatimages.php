<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatimages extends Model
{
    protected $fillable = [
        'from_name','message','to_id','to_name','from_id'
    ];
}
