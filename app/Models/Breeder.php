<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    use HasFactory;
    protected $table = 'breeders';
    protected $fillable = [
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

    public function address()
    {
        return $this->hasOne(BreederAddress::class, 'address_id');
    }

    public function fishes()
    {
        return $this->hasMany(Fish::class);
    }

}
