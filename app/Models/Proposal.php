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
}
