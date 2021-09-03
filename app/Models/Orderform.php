<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderform extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'type',
        'prize',
    ];
}
