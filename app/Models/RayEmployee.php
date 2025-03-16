<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RayEmployee extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function rays()
    {
        return $this->hasMany(Ray::class);
    }
}
