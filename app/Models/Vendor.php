<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    protected $fillable = [
    	'id',
    	'name',
    	'address',
        'phone_number',
    	'description',
    ];

    function proposal() {
        return $this->hasMany(\App\Models\Proposal::class);
    }
}
