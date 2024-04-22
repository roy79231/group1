<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liang extends Model
{
    use HasFactory;

    protected $table = 'liangs';
    protected $fillable=[
        'content',
        'inputer',
    ];
}
