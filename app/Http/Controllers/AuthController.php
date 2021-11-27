<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'role'=>'string'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
         
            'password' => bcrypt($fields['password']),
            'role' => $fields['role']
        ]);

     //   $token = $user->createToken('myapptoken')->plainTextToken;
       /// $user->attachRole('user'); 
        //later we will make doctor or patient
        $user->attachRole($request->role);
        $response = [
            'user' => $user,
     ///       'token' => $token
        ];

        return response($response, 201);
    }
    public function logout(Request $request) {
          ///auth()->user()->tokens()->delete();
          $request->user()->currentAccessToken()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'device_name'=>'required',
        ]);

        // Check email
        $user = User::where('email', $request->email)->first();

        // Check password
        if(!$user || !Hash::check( $request->password, $user->password)) {
           throw validationException::withMessages([
               'email'=>['inncorect ']
           ]);
            /*  return response([
               
                'message' => 'Bad creds'
            ], 401); */
        }
      /// $token = $user->createToken('myapptoken')->plainTextToken;
       $token = $user->createToken($request->device_name)->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
       
            return response($response, 201);
           
 
    }
    public function refresh(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(['token' => $user->createToken($user->name)->plainTextToken]);
    }
}
