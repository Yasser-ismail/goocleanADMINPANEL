<?php

namespace App\Models\Relationship;


trait ServiceRelations
{
    public function companies()
    {
        return $this->belongsToMany('App\Models\Company');
    }

    public function appoientments()
    {
        return $this->belongsToMany('App\Models\Appoientment');
    }
}
