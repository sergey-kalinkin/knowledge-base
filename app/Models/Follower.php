<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Follower extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'uuid',
        'lastName',
        'firstName',
        'middleName',
        'displayName',
        'login',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function permissions()
    {
        return $this->morphToMany(JobPosition::class, 'ability', 'job_permissions');
    }
}
