<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{


    protected $guarded = [];
    use HasFactory;

    public function Group()
    {
        return $this->belongsTo(Group::class,'Group_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'Service_id');
    }

    public function Patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }




}
