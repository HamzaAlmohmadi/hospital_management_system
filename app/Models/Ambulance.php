<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{

    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
