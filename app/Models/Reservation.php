<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = [];
    
    // public function patient(){
    //     return $this->belongsTo(Patient::class);
    // }

    
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }


    public function section(){
        return $this->belongsTo(Section::class);
    }
}
