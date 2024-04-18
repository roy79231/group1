<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tim_lin_post extends Model
{
    use HasFactory;

    protected $table ='tim_lin_post';
    protected $fillable=[
        'content',
        'inputer',
    ];
}