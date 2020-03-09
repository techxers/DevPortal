<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
    public function feature()
    {
        return $this->hasOne(Feature::class);
    }
}
