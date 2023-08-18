<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'discription',
        'discount',
        'tax',
        'total',
    ];
}
