<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Informa ao laravel que a coluna items vai receber um array.
    // e laravel passa a entender esse dados diferentes.
    protected $casts = [
        'items' => 'array'
    ];
}
