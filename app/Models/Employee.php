<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'year_id',
        'lead_id',
        'id_number',
        'family_number',
        'tax_number',
        'name',
        'gender_id',
        'birth_place',
        'birth_date',
        'department_id',
        'join_date',
        'expire_date',
        'salary',
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
        'last_education',
        'picture',
        'marital_status',
        'religion_id',
        'blood_type_id',
        'work_location_id',
    ];

    function gender() {
        return $this->hasOne(\App\Models\Gender::class);
    }

    function religion() {
        return $this->hasOne(\App\Models\Religion::class);
    }
    
    function bloodType() {
        return $this->hasOne(\App\Models\BloodType::class);
    }
    
    function workLocation() {
        return $this->hasOne(\App\Models\workLocation::class);
    }
    
    function proposal() {
        return $this->hasMany(\App\Models\Proposal::class);
    }

    function department() {
        return $this->hasOne(\App\Models\Department::class);
    }

    function user() {
        return $this->hasOne(\App\Models\User::class);
    }
}