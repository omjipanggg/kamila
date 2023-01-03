<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $table = 'genders';

    protected $guarded = [];

    function applicant() {
    	return $this->belongsToMany(\App\Models\Applicant::class);
    }

    function employee() {
    	return $this->belongsToMany(\App\Models\Employee::class);
    }
}
