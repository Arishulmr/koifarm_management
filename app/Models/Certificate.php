<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable= [
        'certificate_code',
        'fish_id',
        'certificate_image',
        'certificate_date',
    ];

    public function fish()
    {
        return $this->belongsTo(Fish::class, 'fish_id');
    }
}
