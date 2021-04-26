<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgnaization extends Model
{
    use HasFactory;
    protected $table = "orgnaizations";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'phone'
    ];
}
