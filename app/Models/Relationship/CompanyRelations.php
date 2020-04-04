<?php

namespace App\Models\Relationship;


trait CompanyRelations
{
    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }

    public function cities()
    {
        return $this->belongsToMany('App\Models\City');
    }

    public function workinghours()
    {
        return $this->hasMany('App\Models\Workinghour');
    }



    public function appoientments()
    {
        return $this->hasMany('App\Models\Appoientment');
    }
}
