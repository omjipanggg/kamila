<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantStat extends Model
{
    use HasFactory;

    protected $table = 'applicant_stats';

    protected $fillable = ['name'];

    function applicant() {
    	return $this->belongsTo(\App\Models\Applicant::class);
    }

}
