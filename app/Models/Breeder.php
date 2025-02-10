<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    use HasFactory;
    protected $fillable = [
        'breeder_id',
        'breeder_name',
        'breeder_email',
        'breeder_phone',
        'user_id',
        'address_id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}