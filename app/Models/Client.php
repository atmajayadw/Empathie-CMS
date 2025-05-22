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
        'client_id',
        'photo'
        ];

        protected $casts = [
        'photo' => 'array',
    ];

    public function setNameAttribute($value){
    $this->attributes['name'] = $value;
    $this->attributes['client_id'] = Str::slug($value);
    }

    public function setCategoryNameAttribute($value){
    $this->attributes['category_name'] = $value;
    $client = $this->attributes['client_id'] ?? '';
    $slugBase = trim($value . ' ' . $client);
    $this->attributes['client_id'] = Str::slug($slugBase);
    }

    public function setDateAttribute($value){
    $this->attributes['date'] = $value;
    $client = $this->attributes['client_id'] ?? '';
    $slugBase = trim($client . ' ' . $value);
    $this->attributes['client_id'] = Str::slug($slugBase);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_name', 'category_name');
    }

    public function data_list(): HasMany
    {
        return $this->hasMany(Client::class);
    }

}
