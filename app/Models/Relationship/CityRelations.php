<?php

namespace App\Models\Relationship;


trait CityRelations
{
    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function appoientments()
    {
        return $this->hasMany('App\Models\Appoientment');
    }

    public function workinghours()
    {
        return $this->hasMany('App\Models\Wourkinghour');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Models\Company');
    }

}
