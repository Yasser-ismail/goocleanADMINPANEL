<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Filters\Filterable;
use App\Models\Scopes\AppoientmentScopes;
use App\Models\Relationship\AppoientmentRelations;

class Appoientment extends Model
{
    use Filterable, AppoientmentRelations, AppoientmentScopes, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['serial', 'company_id', 'client_id', 'workinghour_id', 'time_id', 'address', 'city_id', 'total_price'];
    protected $dates = ['deleted_at'];

    public function totalPrice()
    {
        return $this->services()->sum('price');
    }

}
