<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rpost extends Model
{
    use HasFactory;    
    protected $table='rposts';

    protected $fillable=['inputer','content'];
}
