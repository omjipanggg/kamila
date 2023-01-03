<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HigherEducation extends Model
{
    use HasFactory;

    protected $table = 'higher_educations';
    protected $timestamps = false;
    protected $guarded = [];
}
