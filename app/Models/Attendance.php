<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = "attendances";
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        "id",
    	"employee_id",
    	"attendance_date",
    	"on_duty",
    	"off_duty",
    	"task_done",
    ];
    
    protected $casts = [
        'id' => 'string',
    ];
}
