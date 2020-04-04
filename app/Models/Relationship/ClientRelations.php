<?php

namespace App\Models\Relationship;


trait ClientRelations
{
    public function city(){
        return $this->belongsTo('App\Models\City');
    }

    public function appoientments(){
        return $this->hasMany('App\Models\Appoientment');
    }
}
