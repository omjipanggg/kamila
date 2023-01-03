<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalApplicant extends Model
{
    use HasFactory;

    protected $guarded = [];

    function applicant() {
        return $this->belongsTo(\App\Models\Applicant::class);
    }
    function proposal() {
        return $this->belongsTo(\App\Models\Proposal::class);
    }
    function vendor() {
        return $this->hasOneThrough(\App\Models\Vendor::class, \App\Models\Proposal::class);
    }
    function position() {
        return $this->hasOneThrough(\App\Models\Position::class, \App\Models\Proposal::class);
    }
}
