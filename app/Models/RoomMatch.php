<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomMatch extends Model
{

    protected $table = 'matches';

    protected $fillable = [

        'sender_id',

        'receiver_id',

        'status',

        'expired_at'

    ];

}