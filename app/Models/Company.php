<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Filters\Filterable;
use App\Models\Scopes\CompanyScopes;
use App\Models\Relationship\CompanyRelations;

class Company extends Model
{
    use Filterable,CompanyRelations,CompanyScopes, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'service_id', 'city_id'];
    protected $dates = ['deleted_at'];

    protected static function boot() {
        parent::boot();

        static::deleting(function($company) {
            $company->workinghours()->delete();
            $company->appoientments()->delete();
        });
    }

    public function availableDatesForCity($c_id)
    {
        $wourkinghours = $this->workinghours()->where('city_id', $c_id)->GetAvailableDates()->get();
        $availableDates = [];
        foreach ($wourkinghours as $wourkinghour){
            if ($wourkinghour->no_of_interviews > $wourkinghour->countOfReservedTimes()){
                $availableDates[] = $wourkinghour;
            }
        }
        return $availableDates;
    }

}
