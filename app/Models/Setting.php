<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;
use App\Models\Scopes\SettingScopes;
use App\Models\Relationship\SettingRelations;

class Setting extends Model
{
    use Filterable,SettingRelations,SettingScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['aboutus_title', 'aboutus_des', 'aboutus_content'];

}
