<?php

namespace App\Models\Relationship;


trait TimeRelations
{
    public function workinghour()
    {
        return $this->belongsTo('App\Models\Workinghour');
    }

    public function appoientment()
    {
        return $this->hasOne('App\Models\Appoientment');
    }
}
