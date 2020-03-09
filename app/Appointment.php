<?php

namespace App;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    //use SoftDeletes;

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'transaction_date',
    ];

    /*Needed to make all attributes mass assignable*/
    protected $guarded = [];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
    public function scopeFilterDates($query)
    {
        $date = explode(" - ", request()->input('from-to', ""));

        if(count($date) != 2)
        {
            $date = [now()->subDays(29)->format("Y-m-d"), now()->addDays(29)->format("Y-m-d")];
        }

        return $query->whereBetween('dateTime', $date);
    }
}
