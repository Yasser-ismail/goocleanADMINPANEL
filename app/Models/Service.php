<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use App\Models\Scopes\ServiceScopes;
use App\Models\Relationship\ServiceRelations;

class Service extends Model
{
    use Filterable, ServiceRelations, ServiceScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'image'];


    public function getPriceAttribute($value)
    {
        return number_format($value, 2);
    }

}
