<?php

namespace App\Models\Relationship;


trait AppoientmentRelations
{
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function workinghour()
    {
        return $this->belongsTo('App\Models\Workinghour');
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }

    public function time()
    {
        return $this->belongsTo('App\Models\Time');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
