<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishSize extends Model
{
    use HasFactory;
  protected $primaryKey = 'size_id';
    protected $fillable = [
        'fish_id',
        'fish_size',
        'fish_weight',
        'user_id',
        'measured_date'
    ];

    public function fish()
    {
        return $this->belongsTo(Fish::class, 'fish_id', 'fish_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
