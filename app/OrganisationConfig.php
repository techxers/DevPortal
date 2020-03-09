<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganisationConfig extends Model
{
    /*Needed to make all attributes mass assignable*/
    protected $guarded = [];
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
}
