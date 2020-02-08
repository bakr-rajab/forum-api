<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;
use App\Http\Resources\ReplyResource;
use App\models\Thread;
use App\Repositories\API\ThreadRepo;
use App\Repositories\ReplyRepo;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    protected $replyRepo;

    public function __construct(ReplyRepo $replyRepo)
    {
        $this->replyRepo = $replyRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param int $thread
     * @param  ReplyRequest  $request
     * @return ReplyResource
     */
    public function store(ReplyRequest $request, $thread)
    {
        return new ReplyResource($this->replyRepo->storeReply($request,$thread));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$thread, $id)
    {
//        return $request->all();
        return $this->replyRepo->updateReply($request,$id,$thread);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($thread,$id)
    {
//        return $id;
        return $this->replyRepo->deleteReply($id,$thread);
    }
}
