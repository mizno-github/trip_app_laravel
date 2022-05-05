<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserLoginRequest;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasApiTokens;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(UserRegisterRequest $request)
    {
        $user = $this->user->createUser($request);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
        ]);
    }

    public function update(UserUpdateRequest $request)
    {
        $result = $this->user->updateByUserModel($request);

        if ($result) {
            return response()->json(['更新が完了しました'], 200);
        } else {
            return response()->json(['更新が失敗しました'], 400);
        }
    }

    public function destroy(Request $request)
    {
        $this->user->deleteUser($request->user());
        return response()->json(['ユーザー削除が完了しました'], 200);
    }

    public function login(UserLoginRequest $request)
    {
        $user = $this->user->getUserByEmailAndPassword($request);

        if ($user === null) {
            return response()->json(['メールアドレスかpasswordが間違っています'], 404);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token
        ]);
    }

    public function me(Request $request)
    {
        return $request->user();
    }

    public function logout(Request $request)
    {
        $this->user->logout($request);
        return response()->json(['ok'], 200);
    }
}
