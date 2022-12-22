<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $table = 'activity_logs';

    protected $fillable = [
    	'id',
    	'user_id',
    	'query',
    	'affected_table',
    ];
    function user() {
    	return $this->belongsToMany(\App\Models\User::class);
    }
}
