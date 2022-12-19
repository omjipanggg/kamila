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
    	'zipcode',
    	'latitude',
    	'longitude',
    ];
}
