<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Filters\Filterable;
use App\Models\Scopes\ClientScopes;
use App\Models\Relationship\ClientRelations;

class Client extends Model
{
    use Filterable,ClientRelations,ClientScopes, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'city_id'];
    protected $dates = ['deleted_at'];

}
