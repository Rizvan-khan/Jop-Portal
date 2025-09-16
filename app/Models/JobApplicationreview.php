<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplicationreview extends Model
{
      protected $table = 'job_applicationreviews';
   protected $fillable = ['job_id','user_id','status'];

    public function job():BelongsTo
    {
return $this->belongsTo(User::class);
    }
}
