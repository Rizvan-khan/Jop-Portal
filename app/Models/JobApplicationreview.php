<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplicationreview extends Model
{
   protected $fillable = ['job_id','user_id','status'];

   

     public function user():BelongsTo
    {
return $this->belongsTo(User::class);
    }


    public function job():BelongsTo
    {
return $this->belongsTo(Company_Jobs::class);
    }
}
