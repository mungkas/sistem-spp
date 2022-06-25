<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $table = 'notif';
   
    protected $fillable = [
          'subjek', 'body'
    ];
}
