<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $guarded = [];
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

}
