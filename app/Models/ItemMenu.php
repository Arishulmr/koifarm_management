<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Models\Permission;

class ItemMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'url',
        'tag',
        'icon_menu',
        'permission',
        'status',
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // public function permissions()
    // {
    //     return $this->hasMany(\Spatie\Permission\Models\Permission::class, 'feature', 'permission');
    // }
}
