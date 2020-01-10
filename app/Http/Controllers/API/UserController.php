<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\API\UserRepo;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function signUp(RegisterRequest $request)
    {
        $res = $this->userRepo->register($request);
        return response()->json($res);
    }

    public function signIn(LoginRequest $request)
    {
        $res = $this->userRepo->login($request);
        return response()->json($res);
    }
 public function signOut()
    {
        $res = $this->userRepo->apiLogout();
        return response()->json($res);
    }


}
