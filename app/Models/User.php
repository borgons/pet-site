<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

        //PRIMARY KEY 
        protected $primaryKey = 'userID';

        //TABLE
        protected $table = 'tblusers';

        // TIMESTAMPS
        public $timestamps = false;

    
    protected $fillable = [
        'userID',
        'userFirst',
        'userLast',
        'userPosition',
        'userPassword'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *

     */
    protected $hidden = [
        'userPassword',
        //'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
