<?php

namespace App\Models\Relationship;


trait WorkinghourRelations
{
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function appoientments()
    {
        return $this->hasMany('App\Models\Appoientment');
    }

    public function times()
    {
        return $this->hasMany('App\Models\Time');
    }
}
