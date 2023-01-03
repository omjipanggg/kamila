<?php

namespace App\Models;

use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory, HasUuids;

	public $incrementing = false;

    protected $primaryKey = 'id';
    protected $keyType = 'uuid';

    protected $guarded = [];
}
