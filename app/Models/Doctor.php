<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    
    protected $guarded = [];

    // العلاقة مع جدول المستخدمين
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع جدول الأقسام
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // العلاقة مع جدول الأيام (Many-to-Many)
    public function days()
    {
        return $this->belongsToMany(Day::class);
    }



    
}
