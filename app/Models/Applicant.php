<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicants';

    protected $fillable = [
    	'id',
    	'id_number',
    	'name',
    	'birth_place',
    	'birth_date',
    	'address_on_id',
    	'city_on_id',
    	'province_on_id',
    	'zip_code_on_id',
    	'current_address',
    	'current_city',
    	'current_province',
    	'current_zip_code',
    	'phone_number',
    	'email',
    	'username',
    	'religion',
    	'gender',
    	'blood_type',
    	'last_education',
    	'password',
    	'picture',
    	'marital_status',
    	'ready_to_work',
    	'expected_salary',
    	'expected_facility',
    	'resume',
    ];

    protected $casts = [
        'id' => 'string',
    ];
}
