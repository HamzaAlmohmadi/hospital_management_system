<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'seen',
    ];

    // علاقة مع المستخدم المرسل
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // علاقة مع المستخدم المستقبل
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
