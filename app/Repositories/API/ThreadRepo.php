<?php

namespace App\Repositories\API;

use App\models\Thread;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ThreadRepo.
 */
class ThreadRepo extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
        return Thread::class;
    }
    public function getThreads(){
        return $this->with('user','replies.user')->get();
    }
    public function addReply($reply,$id){

        $thread=$this->getById($id);
        return $thread->replies()->create($reply);
    }
}
