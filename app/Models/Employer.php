<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable
{
   protected $fillable = ['name','email','password'];
     protected $hidden = [
        'password',
    ];

    public function companies()
{
    return $this->hasMany(Company::class);
}
}
