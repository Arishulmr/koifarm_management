<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable= [
        'certificate_id',
        'certificate_type',
        'certificate_code',
        'fish_id',
        'certificate_image',
        'certificate_date',
    ];
}