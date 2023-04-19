<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AdminLoginRequest;
// use App\Http\Requests\UserRegisterRequest;
// use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function loginAdmin(AdminLoginRequest $request) {
        $credentials = $request->only('mobile_number', 'password');
        try {
            if (!$token = auth()->guard('admins')->attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'Some Error Message'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        return $this->respondWithToken($token);
      }
      /**
       * Construct a json object to send to client
       * @param string token
       * @return Illuminate\Http\JsonResponse
      */
      protected function respondWithToken($token)
      {
          return response()->json([
              'success' => true,
              'data' => [
                  'access_token' => $token,
                  'token_type' => 'bearer',
                  'expires_in' => auth()->factory()->getTTL() * 60
              ]
          ], 200);
      }

}
