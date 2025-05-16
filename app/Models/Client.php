<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Relations\HasMany; //untuk relasi antar table
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Client extends Model
{
        use HasFactory, SoftDeletes;
    
        protected $fillable = [
        'client',
        'category',
        'date',
        'thumbnail',
        'client_id'
    ];
}
