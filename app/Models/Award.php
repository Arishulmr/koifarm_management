<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;
    protected $primaryKey = 'award_id';
    protected $fillable= [
        'award_code',
        'fish_id',
        'award_image',
        'award_placement',
    ];

    public function fish()
    {
        return $this->belongsTo(Fish::class, 'fish_id', 'fish_id');
    }
}