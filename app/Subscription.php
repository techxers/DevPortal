<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'transaction_date',
    ];
    protected $guarded = [];
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function scopeFilterDates($query)
    {
        $date = explode(" - ", request()->input('from-to', ""));

        if (count($date) != 2) {
            $date = [now()->subDays(29)->format("Y-m-d"), now()->addDays(29)->format("Y-m-d")];
        }

        return $query->whereBetween('subscribed_on', $date);
    }

}
