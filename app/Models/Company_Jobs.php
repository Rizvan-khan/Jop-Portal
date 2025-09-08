<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\JobSave;
use App\Models\JobApplicationreview;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company_Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation', 'requirement', 'description', 'salary',
        'location', 'address',
        'employer_id'
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

      public function saves()
    {
        return $this->hasMany(JobSave::class, 'job_id');
    }


      public function job():HasOne
    {
        return $this->hasOne(JobApplicationreview::class);
    }
}
