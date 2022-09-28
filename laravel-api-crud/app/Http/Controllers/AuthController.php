<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        if(!$request->email && !$request->password){
            return response(['message'=>'email and password are require']);
        }

        $user=User::where('email',$request->email)->first();

        if($user){
            if($user->password==$request->password){
                $access_token=$user->createToken('authToken')->plainTextToken;
                return response(['assess_token'=>$access_token,'User'=>$user]);

            }
        }
        return response(['message'=>'user not found']);
    }
}
