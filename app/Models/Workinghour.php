<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Filters\Filterable;
use App\Models\Scopes\WorkinghourScopes;
use App\Models\Relationship\WorkinghourRelations;

class Workinghour extends Model
{
    use Filterable, WorkinghourRelations, WorkinghourScopes, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'city_id', 'date', 'start', 'end', 'interval', 'no_of_interviews'];
    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($workinghour) {
            $workinghour->times()->delete();
            $workinghour->appoientments()->delete();
        });
    }

    public function countOfReservedTimes()
    {
        return $this->no_of_interviews - $this->times()->AvailableTime()->count();
    }

}
