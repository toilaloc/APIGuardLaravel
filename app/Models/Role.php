<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $primaryKey = "id";
    protected $fillable = [
        'name'
    ];

    public function permission()
    {
        return $this->hasMany(Permission::class);
    }
    public function users()
    {
        return $this->belongsToMany(UserRole::class, 'user_role', 'role_id', 'user_id');
    }
    public function belongUsers()
    {
        return $this->belongsToMany(UserRole::class, 'user_role', 'role_id', 'user_id');
    }

}
