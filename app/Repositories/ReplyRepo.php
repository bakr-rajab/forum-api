<?php

namespace App\Repositories;

use App\models\Reply;
use App\Repositories\API\ThreadRepo;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class ReplyRepo.
 */
class ReplyRepo extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    protected $threadClass;

    public function __construct(ThreadRepo $threadClass)
    {
        $this->threadClass = $threadClass;
    }

    public function model()
    {
        //return YourModel::class;
        return Reply::class;
    }

    public function storeReply($request, $thread)
    {
        $thread = $this->threadClass->getById($thread);
        $request['user_id'] = auth('api')->id();
        return $thread->replies()->create($request->all());
    }

    public function deleteReply($id, $thread)
    {
        $thread = $this->threadClass->getById($thread);
        return $thread->replies()->where('id', $id)->delete();
    }

    public function updateReply($request, $id, $thread)
    {
        $thread = $this->threadClass->getById($thread);
        $data = array(
            'body' => $request['body'],
            'user_id' => auth('api')->id()
        );
        return $thread->replies()->where('id', $id)->update($data);
    }
}
