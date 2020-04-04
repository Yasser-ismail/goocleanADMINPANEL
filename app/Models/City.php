<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Filters\Filterable;
use App\Models\Scopes\CityScopes;
use App\Models\Relationship\CityRelations;

class City extends Model
{
    use Filterable, CityRelations, CityScopes, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public function income()
    {
        $appointments = $this->appoientments()->get();
        $income = 0;
        foreach ($appointments as $appointment){
            $income += $appointment->totalPrice();
        }

        return $income;
    }

}
