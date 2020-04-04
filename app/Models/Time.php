<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Filters\Filterable;
use App\Models\Scopes\TimeScopes;
use App\Models\Relationship\TimeRelations;

class Time extends Model
{
    use Filterable,TimeRelations,TimeScopes, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['workinghour_id', 'time', 'reserved', 'appoientment_id'];
    protected $dates = ['deleted_at'];
}
