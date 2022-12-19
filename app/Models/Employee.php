<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'id_number',
        'family_number',
        'tax_number',
        'name',
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
}