<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $hidden = [
        "password",
    ];

    public function qualifications(): HasMany
    {
        return $this->hasMany(Admin::class);
    }
    public function skills(): HasMany
    {
        return $this->hasMany(Admin::class);
    }
    public function image(): HasOne
    {
        return $this->hasOne(Image::class);
    }
}
