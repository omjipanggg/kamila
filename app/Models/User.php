<?php

namespace App\Models;

use App\Traits\HasUuids;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable // implements MustVerifyEmail 
{
    use HasApiTokens, HasUuids, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    public $incrementing = false;
    
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';

    protected $fillable = [
        'name',
        'role_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id' => 'string',
    ];

    function role() {
        return $this->belongsTo(\App\Models\Role::class);
    }

    function attendance() {
        return $this->belongsToMany(\App\Models\UserAttendance::class);
    }

    function employee() {
        return $this->belongsTo(\App\Models\Employee::class);
    }
}
