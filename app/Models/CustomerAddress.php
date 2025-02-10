<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'address_id',
        'address_province',
        'address_city',
        'address_subdistrict',
        'address_ward',
        'address_street',
        'address_postal',
        'address_details',
        'created_at',
        'updated_at'
    ];
}
