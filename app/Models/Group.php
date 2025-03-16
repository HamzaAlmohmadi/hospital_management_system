<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    
    public $guarded=[];




    public function service_group()
    {
        return $this->belongsToMany(Service::class,'service_group')->withPivot('quantity');
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }



}
