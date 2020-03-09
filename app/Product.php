<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
