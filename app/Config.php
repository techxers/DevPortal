<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model


{
    /*Needed to make all attributes mass assignable*/
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
