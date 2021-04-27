<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\Pivot;
class User extends Authenticatable implements JWTSubject
{
    CONST ADMIN_ROLE_ID = 1;
    CONST ADMIN_ORG_ROLE_ID = 2;
    CONST WRITER_ROLE_ID = 3;

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'orgnaization_id',
        'full_name',
        'date_of_birth',
        'address'
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

    public function roles()
    {
        return $this->hasMany(UserRole::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function permissions()
    {
        return $this->hasManyThrough(
            RolePermission::class,
            UserRole::class,
            'user_id',
            'role_id',
            'id',
            'role_id');
    }
    public function orgnaizations()
    {
        return $this->hasOne(Orgnaization::class);
    }

    public function isAdmin()
    {
        return $this->roles->first()->role_id === self::ADMIN_ROLE_ID;
    }

    public function isAdminOrg()
    {
        return $this->roles->first()->role_id === self::ADMIN_ORG_ROLE_ID;
    }

    public function isWriter()
    {
        return $this->roles->first()->role_id === self::WRITER_ROLE_ID;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
