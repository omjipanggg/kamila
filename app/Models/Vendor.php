<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
    ];

    function proposal() {
        return $this->hasMany(\App\Models\Proposal::class);
    }
}
