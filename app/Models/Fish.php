<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;
    protected $table = 'fishes';
    protected $primaryKey = 'fish_id';
    protected $fillable = [
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

    public function breeder()
    {
        return $this->belongsTo(Breeder::class, 'breeder_id', 'breeder_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'transaction_id');
    }

    public function sizes()
    {
        return $this->hasMany(FishSize::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
