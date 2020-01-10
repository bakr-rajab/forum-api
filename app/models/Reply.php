<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable=[
        'title','body','user_id','thread_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function thread(){
        return $this->belongsTo(Thread::class,'thread_id','id');
    }
    //
}
