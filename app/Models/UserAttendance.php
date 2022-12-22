<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAttendance extends Model
{
    use HasFactory;

    protected $table = 'user_attendances';

    protected $fillable = [
    	'user_id',
    	'attendance_id',
    	'attendance_date',
    	'task_done',
    	'on_duty',
    	'off_duty',
        'on_image',
        'off_image',
        'on_latitude',
        'on_longitude',
        'on_distance',
        'off_latitude',
        'off_longitude',
        'off_distance',
    	'description',
    ];

    function user() {
        return $this->belongsToMany(\App\Models\User::class);
    }
    function attendance() {
        return $this->belongsToMany(\App\Models\Attendance::class);
    }

}
