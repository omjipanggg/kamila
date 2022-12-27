<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantStatus extends Model
{
    use HasFactory;

    protected $table = 'applicant_status';

    protected $fillable = ['name'];

    function applicant() {
    	return $this->belongsTo(\App\Models\Applicant::class);
    }
}
