<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    
    protected $table = 'patients';
    protected $guarded = [];

    public function patient_account()
    {
        return $this->hasMany(PatientAccount::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
