<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $guarded = [];

    function gender() {
        return $this->hasOne(\App\Models\Gender::class);
    }

    function religion() {
        return $this->belongsTo(\App\Models\Religion::class);
    }
    
    function bloodType() {
        return $this->belongsTo(\App\Models\BloodType::class);
    }
    
    function workPlace() {
        return $this->belongsTo(\App\Models\WorkLocation::class);
    }
    
    function proposal() {
        return $this->belongsToMany(\App\Models\Proposal::class);
    }

    function department() {
        return $this->belongsTo(\App\Models\Department::class);
    }

    function user() {
        return $this->belongsTo(\App\Models\User::class);
    }    

    function role() {
        return $this->hasOneThrough(\App\Models\Roles::class, \App\Models\User::class);
    }
}