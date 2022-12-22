<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    
    protected $table = 'proposals';

    protected $fillable = [
        'id',
    	'department_id',
    	'qualification',
    	'description',
    	'permalink',
    	'phone_number',
    	'vendor_id',
    	'published_by',
    ];

    function publishedBy() {
        return $this->belongsTo(\App\Models\Employee::class);
    }

    function vendor() {
        return $this->belongsTo(\App\Models\Vendor::class);
    }

    function department() {
        return $this->belongsTo(\App\Models\Department::class);
    }

}
