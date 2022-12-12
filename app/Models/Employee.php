<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
    	'id',
    	'detail_id',
    	'department_id',
    	'start_date',
    	'end_date',
    ];

    protected $casts = [
        'id' => 'string',
    ];
}
