<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;

    protected $table = 'religions';

    protected $guarded = [];

    function applicant() {
    	return $this->belongsToMany(\App\Models\User::class);
    }

    function employee() {
    	return $this->belongsToMany(\App\Models\Employee::class);
    }
}
