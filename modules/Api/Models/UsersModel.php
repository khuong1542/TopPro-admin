<?php

namespace Modules\Api\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersModel extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';
    public $incrementing = false;

    private $fillable = [

    ];
    
    protected $hidden = [
        'password',
    ];
    
}