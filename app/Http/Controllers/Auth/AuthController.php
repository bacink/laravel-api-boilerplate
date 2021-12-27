<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Specialtactics\L5Api\Http\Controllers\Features\JWTAuthenticationTrait;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthController extends Controller
{
    use JWTAuthenticationTrait;

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // return $this->respondWithToken($token);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json([
            'message' => 'logout success'
        ], 200);
    }

    public function me()
    {
        $uuid = auth()->user()->user_id;

        $model = new User();

        $resource = $model::with($model::getItemWith())->where($model->getKeyName(), '=', $uuid)->first();

        if (!$resource) {
            throw new NotFoundHttpException('Resource \'' . class_basename(static::$model) . '\' with given UUID ' . $uuid . ' not found');
        }

        $this->authorizeUserAction('view', $resource);

        return $this->response->item($resource, $this->getTransformer());
    }
}
