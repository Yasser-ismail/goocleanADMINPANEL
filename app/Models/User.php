<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Models\Scopes\UserScopes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use App\Models\Relationship\UserRelations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, UserRelations, UserScopes, Filterable, HasApiTokens, HasMediaTrait;

    /**
     * The code of the root type.
     *
     * @var int
     */
    const ROOT_TYPE = 1;

    /**
     * The type of the Supervisor type.
     *
     * @var string
     */
    const SUPERVISOR_TYPE = 'supervisor';

    /**
     * The type of the Admin type.
     *
     * @var string
     */
    const ADMIN_TYPE = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'phone_number',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Hash the password before insert into database.
     *
     * @param $password
     * @return void
     */
    public function setPasswordAttribute($password): void
    {
        if ($password) {
            // If password was accidentally passed in already hashed, try not to double hash it
            if (
                (\strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
                (\strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password))
            ) {
                $hash = $password;
            } else {
                $hash = Hash::make($password);
            }

            $this->attributes['password'] = $hash;
        }
    }

    /**
     * The user gravatar image.
     *
     * @return bool
     */
    public function getAvatar()
    {
        if ($media = $this->media->first()) {
            return $media->getFullUrl();
        }
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mm';
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatars')->singleFile();
    }
}
