<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
   protected $fillable = ['resume','user_id'];

    public function user():BelongsTo
    {
return $this->belongsTo(User::class);
    }


}
