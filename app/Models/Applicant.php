<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicants';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
    	'id_number',
        'tax_number',
        'healthcare_number',
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
    	'religion_id',
    	'gender_id',
    	'blood_type_id',
    	'last_education',
    	'picture',
    	'marital_status',
    	'ready_to_work',
    	'expected_salary',
    	'expected_facility',
        'status',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    function status() {
        return $this->belongsTo(\App\Models\RecruitmentStatus::class);
    }

    function gender() {
        return $this->belongsTo(\App\Models\Gender::class);
    }

    function bloodType() {
        return $this->belongsTo(\App\Models\BloodType::class);
    }

    function religion() {
        return $this->belongsTo(\App\Models\Religion::class);
    }

    function maritalStatus() {
        return $this->belongsTo(\App\Models\MaritalStatus::class);
    }

    function proposal() {
        return $this->belongsToMany(\App\Models\ProposalApplicant::class);
    }
}
