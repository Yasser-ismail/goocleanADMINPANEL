<?php

namespace App\Observers\BackEnd;

use App\Models\Workinghour;
use Carbon\Carbon;

class WorkinghourObserver
{
    public function creating(Workinghour $workinghour)
    {
        $interval = $workinghour->interval * 60; //in second
        $start = strtotime($workinghour->start);
        $end = strtotime($workinghour->end);

        $start_in_seconds = Carbon::createFromTimestampUTC($start)->secondsSinceMidnight();
        $end_in_seconds = Carbon::createFromTimestampUTC($end)->secondsSinceMidnight();


        $workinghour->no_of_interviews  = (($end_in_seconds - $start_in_seconds) / $interval);

    }

    public function created(Workinghour $workinghour)
    {

        $interval = $workinghour->interval * 60; //in second
        $start = strtotime($workinghour->start);
        $end = strtotime($workinghour->end);

        while ($start < $end) {
            $workinghour->times()->create(['time' => date('H:i:s', $start)]);
            $start += $interval;
        }
    }

    public function updating(Workinghour $workinghour)
    {

        $interval = $workinghour->interval * 60; //in second
        $start = strtotime($workinghour->start);
        $end = strtotime($workinghour->end);

        $start_in_seconds = Carbon::createFromTimestampUTC($start)->secondsSinceMidnight();
        $end_in_seconds = Carbon::createFromTimestampUTC($end)->secondsSinceMidnight();

        $no_of_interviews = (($end_in_seconds - $start_in_seconds) / $interval);

        $workinghour->no_of_interviews = $no_of_interviews;
    }

    public function updated(Workinghour $workinghour)
    {

        $interval = $workinghour->interval * 60; //in second
        $start = strtotime($workinghour->start);
        $end = strtotime($workinghour->end);

        $workinghour->times()->forcedelete();

        while ($start < $end) {
            $workinghour->times()->create(['time' => date('H:i:s', $start)]);
            $start += $interval;
        }
    }

    public function deleted(Workinghour $workinghour)
    {
        $workinghour->times()->delete();
        $workinghour->appoientments()->delete();
    }
}
