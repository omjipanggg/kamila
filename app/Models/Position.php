<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $guarded = [];

    function department() {
    	return $this->belongsTo(\App\Models\Department::class);
    }
    function proposal() {
        return $this->belongsToMany(\App\Models\Proposal::class);
    }
}
