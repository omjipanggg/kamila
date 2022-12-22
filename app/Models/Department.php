<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $fillable = [
    	'id',
        'lead_id',
    	'name',
    	'description',
    ];

    function employee() {
    	return $this->belongsToMany(\App\Models\Employee::class);
    }
    function position() {
        return $this->belongsToMany(\App\Models\Position::class);
    }
    function proposal() {
    	return $this->belongsToMany(\App\Models\Proposal::class);
    }
}
