<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menus";

    protected $fillable = [
    	'id',
    	'name',
    	'role_id',
        'icon',
    	'parent_id',
    	'has_child',
    	'model',
    	'route',
    ];

    protected $casts = [
    	'has_child' => 'boolean',
    ];

    public function childs()
    {
        return $this->hasMany('\App\Models\Menu', 'parent_id', 'id');
    }
}
