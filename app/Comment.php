<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    protected $hidden = ['user_id','tour_id','id','created_at','updated_at'];

    public function user(){
      return $this->belongsTo(User::class,'user_id','id');
    }
}
