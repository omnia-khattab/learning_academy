<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use Auth;
class ApiController extends Controller
{
    //
    function list(){
        $courses=Course::get();
        return response()->json($courses);
    }
    /*function register(Request $request)
    {
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=\Hash::make($request->password);
        $user->access_token=\Str::random(64);
        $user->save();   
        return response()->json(['access_token'=>$user->access_token]);
        
    }
    function login(Request $request)
    {
        $cred=array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt($cred))
        {
            if(!isset(Auth::user()->access_token))
            {
                Auth::user()->access_token=\Str::random(64);
                Auth::user()->save();
            }
            return response()->json(['access_token'=>Auth::user()->access_token]);
            
        }else
        {
            return response()->json(['error'=>'not valid data']);
        }
    }*/
}
