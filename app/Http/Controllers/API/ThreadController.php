<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadRequest;
use App\Http\Resources\ThreadResource;
use App\Repositories\API\ThreadRepo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    protected $threadRepo;

    public function __construct(ThreadRepo $threadRepo)
    {
        $this->threadRepo = $threadRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return ThreadResource::collection($this->threadRepo->getThreads());
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ThreadRequest $request)
    {
        if (!$request->validated()){
            return response()->json($request->validated());
        }
        $user = auth('api')->user();
        return new ThreadResource($user->threads()->create($request->all()));
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return new ThreadResource($this->threadRepo->getById($id));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
//        $user = auth('api')->user();
//        return $request['title'];
        return new ThreadResource($this->threadRepo->updateById($id,$request->all()));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $state = $this->threadRepo->deleteById($id);
            return response()->json($state);
        } catch (ModelNotFoundException $exception) {
            return response()->json($exception);
        }
    }
}
