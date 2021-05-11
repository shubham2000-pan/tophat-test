<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\apimodel\User;

class JWTAuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_active' => 1, 
        ]);

        $user->save();
       

        return new RegistrationResource(['status'=>'success','message'=>'Please check your mail and verify your account']);
       }
       catch (\Exception $e) {
        return new RegistrationResource([
            'status'=>'fail',
            'message' => $e->getMessage()
        ]); 
      } 
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
    	 $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        try {
            if (auth()->attempt($credentials)) {
                $user = auth()->user();
                    if ($user->is_verified === 1) {
                        $token = auth()->user()->createToken($request->email)->accessToken;
                    
                        return response()->json([
                            'status'=>'success',
                            'token' => $token,
                            'message' => 'Account Logged In.',
                        ], 200);
                    } else throw new \Exception("Your account is not yet verified");
            } else throw new \Exception("Email & password not matched.");
        } catch (\Exception $err) {
            return response()->json([
                'status' => 'fail',
                'message' => $err->getMessage()
            ], 422);
        }
    }

   
}
