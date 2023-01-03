<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menus";

    protected $guarded = [];

    protected $casts = [
        'has_child' => 'boolean',
        'has_param' => 'boolean'
    ];

    public function child(){
        return $this->belongsToMany(\App\Models\Menu::class, 'parent_id', 'id');
    }
}
