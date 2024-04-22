<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jamespost extends Model
{
    use HasFactory;
    protected $table='jamesposts';
    protected $fillable=[
        'content',
        'inputer',
    ];
}
