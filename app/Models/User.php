<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * The types of users in the system
     */
    public const TYPES = ['ADMIN', 'DOCTOR', 'NURSE', 'PATIENT'];
    public const TYPE_ADMIN = 'ADMIN';
    public const TYPE_NURSE = 'NURSE';
    public const TYPE_DOCTOR = 'DOCTOR';
    public const TYPE_PATIENT = 'PATIENT';
    public const LOWER_CASE_TYPES_TO_ENUM = ['admin' => 'ADMIN', 'nurse' => 'NURSE', 'doctor' => 'DOCTOR', 'patient' => 'PATIENT'];
    public const ENUM_TYPES_TO_LOWER_CASE = ['ADMIN' => 'admin', 'NURSE' => 'nurse', 'DOCTOR' => 'doctor', 'PATIENT' => 'patient'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set Password Attribute
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
