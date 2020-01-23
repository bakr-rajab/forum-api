<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;


class Thread extends Model
{
    use HasApiTokens;
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
