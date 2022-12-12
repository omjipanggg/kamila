<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    
    protected $table = 'proposals';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
    	'position',
    	'qualification',
    	'description',
    	'published_by',
    ];
}
