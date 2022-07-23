<?php

namespace App\Models;

use App\Models\Helpers\UserHelpers;
use Parental\HasChildren;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasChildren;
    use UserHelpers;
    const ADMIN_TYPE = 'admin';
    const USER_TYPE = 'user';
    protected $guard_name = 'web';

    protected $childTypes = [
        self::ADMIN_TYPE => Admin::class,
        self::USER_TYPE => User::class,
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
