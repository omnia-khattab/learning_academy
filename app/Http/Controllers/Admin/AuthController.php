<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use App\Mail\Registermail;
class AuthController extends Controller
{
    //
    function login(){
        return view('admin.auth.login');
    }

    function handleLogin(Request $request){

        $date=$request->validate([
            'email'=>'required|email|max:100|exists:admins,email',
            'password'=>'required|string',
        ]);

        $cred=array('email'=>$request->email,'password'=>$request->password);
    
        if(Auth::attempt($cred))
        {
            return redirect(route('admin.home'));
        }
        else
        {
            return back();
        }
    }
    function logout(){
        /* i can use auth() if i don't want to put use Auth; like that >>
        auth()->guard('admins')->logout();
        */
        Auth::logout();
        return redirect(route('admin.login'));
    }
//social Login
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $email=$user->email;
        //check if the user alreday exist
        $db_user=Admin::where('email',$email)->first();
        //if not exist create new admin
        if($db_user==null){
            $registerAdmin=Admin::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'password'=>\Hash::make(123),
                'oauth_token'=>$user->token,
                'acess_token'=>\Str::random(64)
            ]);
            //create session for the new login
            Auth::login($registerAdmin);
            //send welcome email
            Mail::to($user->email)->send(new Registermail($user->name));
        }
        //admin already exist
        else{
            Auth::login($db_user);
        }

        return redirect(Route('admin.home'));
    }
}
