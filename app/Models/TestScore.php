<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestScore extends Model
{
    use HasFactory;

    protected $table = 'test_scores';

    protected $guarded = [];
}
