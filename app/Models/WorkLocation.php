<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkLocation extends Model
{
    use HasFactory;

    protected $table = 'work_locations';

    protected $fillable = [
    	'name',
    	'street',
    	'erte',
    	'erwe',
    	'district',
    	'state',
    	'city',
        'province',
    	'zipcode',
    	'latitude',
    	'longitude',
    ];

    public function employee() {
        return $this->belongsToMany(\App\Models\Employee::class);
    }
    public function contract() {
        return $this->belongsToMany(\App\Models\GeneratedContract::class);
    }
}
