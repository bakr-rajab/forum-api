<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Chanel extends Model
{
    protected $fillable=['name','slug'];

    public function threads(){
        return $this->hasMany(Thread::class);
    }
}
