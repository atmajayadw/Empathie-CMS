<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Relations\HasMany; //untuk relasi antar table
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    
        protected $fillable = [
        'category_name',
    ];

    public function client_list(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    
}
