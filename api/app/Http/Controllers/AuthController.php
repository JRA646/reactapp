<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthController extends Controller
{
    public function login(Request $request){
        $credential = $request->only('email','password');
        $token="";
        if(Auth::attempt($credential)){
            $token = User::where('email',$request->email)->first();
            if($token['remember_token'] === "" || $token['remember_token'] === null){
                $token = Str::random(50);
                User::where('email',$request->email)->update(['remember_token'=>$token]);
            }
            else{
                $token = $token['remember_token'];
            }

            
        }

        return $token;
    }

    public function registration(Request $request, User $user){

        $user->name = Str::ucfirst($request->fistname).Str::ucfirst($request->lastname);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        if($user->save()){
            return [
                'status' => 200,
                'resposnse' => 's'
            ];
        }
    }
}
