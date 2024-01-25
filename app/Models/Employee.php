<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'password'
    ];
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }


    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
