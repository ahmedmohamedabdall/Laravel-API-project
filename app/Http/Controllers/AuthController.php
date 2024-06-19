<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\userRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(userRequest $request)
    {
        $validated=$request->validated();
        $user=User::create(   [ 
            'name'=> $validated['name'],
            'email' => $validated['email'],
            'password' =>bcrypt($validated['password']) 
        ]);
        $token=$user->createToken('apiToken')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        
        return response($response,201);

    }
    public function login(loginRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email',$validated['email'])->first();

if (!$user||!Hash::check($validated['password'],$user->password)) {
    return response(
        ['message'=>'fuckkkk']
    ,401);
}
else{
        $token = $user->createToken('apiToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return ['message'=>'log out'];
    }

}


