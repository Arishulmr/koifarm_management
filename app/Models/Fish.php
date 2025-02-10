<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;
    protected $fillable = [
        'fish_id',
        'fish_code',
        'fish_variety',
        'breeder_id',
        'fish_image',
        'fish_birth_date',
        'fish_import_date',
        'user_id',
        'transaction_id',
        'fish_price',
        'created_at',
        'updated_at',
    ];
}