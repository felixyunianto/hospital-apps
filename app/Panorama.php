<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panorama extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    protected $hidden = ['tour_id','id'];
}
