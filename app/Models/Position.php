<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $fillable = [
    	'name',
    	'department_id',
    	'description',
    ];

    function department() {
    	return $this->belongsTo(\App\Models\Department::class);
    }
    function proposal() {
        return $this->belongsToMany(\App\Models\Proposal::class);
    }
}
