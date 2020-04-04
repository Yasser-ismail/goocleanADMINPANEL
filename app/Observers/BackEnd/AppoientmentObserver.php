<?php

namespace App\Observers\BackEnd;

use App\Models\Appoientment;
use App\Models\Time;

class AppoientmentObserver
{

    public function creating(Appoientment $appoientment)
    {
        //generate serial to appointment
        if (Appoientment::withTrashed()->count() == 0) {
            $id = 1;
        } else {
            $id = Appoientment::latest()->withTrashed()->first()->id + 1;
        }
        $appoientment['serial'] = $id + 999;

        //update appoientment_id time table
        if (Appoientment::withTrashed()->count() === 0) {
            $id = 1;
        } else {
            $id = Appoientment::latest()->withTrashed()->first()->id + 1;
        }
        //update time
        $time = Time::where('id', $appoientment->time_id)->first();
        $time->update(['appoientment_id' => $id, 'reserved' => 1]);
    }



    public function updating(Appoientment $appoientment)
    {
        //update time
        $time = Time::where('id', $appoientment->time_id)->first();
        $time->update(['appoientment_id' => $appoientment->id, 'reserved' => 1]);

    }


    public function deleting(Appoientment $appoientment)
    {
        //update time
        $time = Time::where('id', $appoientment->time_id)->first();
        $time->update(['appoientment_id' => null, 'reserved' => 0]);

    }
}
