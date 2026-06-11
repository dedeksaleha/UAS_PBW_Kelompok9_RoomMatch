<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    protected $fillable = [

        'conversation_id',
        'sender_id',
        'receiver_id',
        'message',
        'is_read'

    ];

}