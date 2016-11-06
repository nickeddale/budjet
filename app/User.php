<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * a user has many tasks
     * @return Eloquent hasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class());
    }


    /**
     * a user has many invoices
     * @return Eloquent hasMany
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class());
    }

}
