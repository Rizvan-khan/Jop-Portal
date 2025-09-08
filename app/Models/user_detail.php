<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class user_detail extends Model
{
      use HasFactory;
    protected $fillable = ['pin_code','headline','user_id','first_name','last_name','phone','street','city','location','show_phone_status','relocation'];

public function user():BelongsTo
{

      return $this->belongsTo(User::class);
}

}
