<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = "attendances";

    protected $fillable = [
        "id",
    	"name",
    	"on_duty",
    	"off_duty",
        "description",
    ];
    
    protected $casts = [
        'id' => 'string',
    ];
}
