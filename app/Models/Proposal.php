<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    
    protected $table = 'proposals';

    protected $fillable = [
        'id',
    	'position_id',
    	'qualification',
    	'description',
    	'permalink',
    	'phone_number',
    	'vendor_id',
    	'published_by',
        'expire_date',
        'active',
    ];

    function published() {
        return $this->hasOne(\App\Models\Employee::class);
    }

    function vendor() {
        return $this->belongsTo(\App\Models\Vendor::class);
    }

    function position() {
        return $this->belongsTo(\App\Models\Position::class);
    }

    function applicant() {
        return $this->belongsToMany(\App\Models\ProposalApplicant::class);
    }
}
