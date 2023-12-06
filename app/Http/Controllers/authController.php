<?php

namespace App\Http\Controllers;

use App\Models\rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class authController extends Controller
{


       /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $token = JWTAuth::parseToken()->refresh();
        return $this->respondWithToken($token);
    }


        /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $expiration = JWTAuth::factory()->getTTL() * 60;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration,
            'expiration_date' => now()->addSeconds($expiration)->toDateTimeString(),
        ]);
    }


    public function register(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users',
                'password'=> 'required|string|min:6',
                'id_rol' => 'required|integer',
                'id_students' => 'integer'
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
            }
            $user = User::create([
                'name' => $request->get('name'),
                'email'=> $request->get('email'),
                'password'=> bcrypt($request->get('password')),
                'id_rol' => $request->get('id_rol'),
                'id_students' => $request->get('id_students')
            ]);
            $token = JWTAuth::fromUser($user);
            return response()->json(compact('user','token'),201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Error al crear el usuario',
                'error'=>$e->getMessage()],500);
        }
    }

    // public function login(Request $request){
    //     try{
    //         if(!Auth::attempt($request->only('email', 'password')))
    //         {
    //             return response()
    //                 ->json(['message'=>'Unauthorized'],401);
    //         }

    //         $user = User::where('email', $request['email'])
    //         ->addSelect(
    //             [
    //                 'rol' =>rol::select('rol')
    //                 ->whereColumn('id_rol','id')
    //             ]
    //         )
    //         ->firstOrFail();

    //         $token = JWTAuth::fromUser($user);

    //         $cookie = cookie('jwt', $token, 60*24); // 1 day

    //         return response()
    //             ->json([
    //                 'message' => 'Success',
    //                 'user' => $user,
    //                 'token' => $this->respondWithToken($token),
    //             ])
    //             ->withCookie($cookie);
    //     }
    //     catch(\Exception $e){
    //         return response()->json([
    //             'message' => 'Error al iniciar sesión',
    //             'error'=>$e->getMessage()],500);
    //     }


    // }

    public function login(Request $request)
    {
        try {
            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $user = User::where('email', $request['email'])
                ->addSelect([
                    'rol' => rol::select('rol')->whereColumn('id_rol', 'id')
                ])
                ->firstOrFail();

            $token = JWTAuth::fromUser($user);
            Log::info('Token generado: ' . $token);

            return response()->json([
                'message' => 'Success',
                'user' => $user,
                'token' => $this->respondWithToken($token),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al iniciar sesión',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function userDetails()
    {
        $user = Auth::guard('api')->user();
        return response()->json( $user);
    }

    public function logout(Request $request){
        /**
       * @var user $user
      */
      $user = Auth::user();

      //Aun no hay JWT
      $userToken = $user->tokens();
      $userToken->delete();
      return response(['message'=> 'Logged Out!!'],200);
  }



}
