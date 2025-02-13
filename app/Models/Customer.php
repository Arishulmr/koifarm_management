<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_password',
        'address_id',
        'created_at',
        'verified_at',
        'updated_at',
    ];

    public function address()
    {
        return $this->hasOne(CustomerAddress::class, 'address_id');
    }
}
