<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'title',
        'description'
    ];

    protected $table = 'contact';
}
