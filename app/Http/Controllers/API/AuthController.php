<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        // dd($request->all());
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        $token = $user->createToken($user->email)->accessToken;
        return response()->json(['token'=>$token, 'user'=>$user], 200);
    }

    public function login(Request $request){
        $data = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(auth()->attempt($data)){
            $token = auth()->user()->createToken(Auth::id())->accessToken;
            // $token = User::createToken(Auth::id())->accessToken;
            return response()->json(['token'=>$token],200);

        }
        else{
            return response()->join(['error'=>'unauthorize'],401);
        }
    }

    public function userInfo(){
        $user = auth()->user();
        return response()->json(['user'=>$user],200);
    }
}
