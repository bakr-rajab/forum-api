<?php

namespace App\Repositories\API;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use phpseclib\Crypt\Hash;
use Spatie\Permission\Models\Role;

//use Your Model

/**
 * Class UserRepo.
 */
class UserRepo extends BaseRepository
{
    protected $userClass;
    public function __construct()
    {
        parent::__construct();
        $this->userClass = $this->model();
    }

    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
        return User::class;
    }

//    public function

    public function login($request)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $userToken = $user->createToken(request('email'));
            $token = $userToken->token;

            $token->save();
            return response()->json([
                'token' => $userToken->accessToken,
                'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
            ], 200);
        }
    }

    public function register($request)
    {

            $user = $this->create($request->all());
            $user->assignRole('customer');
            $userToken = $user->createToken($user->email);
            $token = $userToken->token;

            return response()->json([
                'token' => $userToken->accessToken,
                'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
            ], 200);
    }

    public function apiLogout()
    {
        $token = request()->user()->token();
        $token->revoke();
        $response = 'You have been successfully logged out!';
        return response()->json([
            $response
        ], 200);
    }

}
