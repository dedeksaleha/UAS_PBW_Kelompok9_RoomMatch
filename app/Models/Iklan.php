<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{

    protected $fillable = [

        'user_id',

        'judul',

        'lokasi',

        'harga',

        'gambar',

        'status',

        'gender',

        'umur',

        'pekerjaan',

        'roommate',

        'habit1',

        'habit2'

    ];

}