<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishSize extends Model
{
    use HasFactory;
    protected $fillable = [
        'size_id',
        'fish_id',
        'fish_size',
        'fish_weight',
        'user_id',
        'created_at',
    ];

}
