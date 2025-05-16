<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Relations\HasMany; //untuk relasi antar table
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Client extends Model
{
        use HasFactory, SoftDeletes;
    
        protected $fillable = [
        'name',
        'category_name',
        'date',
        'thumbnail',
        'client_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_name');
    }

    public function data_list(): HasMany
    {
        return $this->hasMany(Client::class);
    }
}
