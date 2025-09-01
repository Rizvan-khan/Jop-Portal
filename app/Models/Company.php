<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
     use HasFactory;

    protected $fillable = [
        'name', 'slug', 'email', 'phone',
        'address', 'city', 'state', 'country', 'pincode',
        'logo', 'website', 'description', 'industry', 'team_size',
        'employer_id'
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
