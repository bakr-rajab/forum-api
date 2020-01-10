<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable=[
        'title','body','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function replies(){
        return $this->hasMany(Reply::class,'thread_id','id');
    }
}
