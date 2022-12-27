<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedContract extends Model
{
    use HasFactory;

    protected $fillable = [
    	
    ];

    function workPlace() {
        return $this->belongsTo(\App\Models\WorkLocation::class);
    }
}

