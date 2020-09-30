<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class ContactController extends Controller
{
    //
    function index(){
        $settings=Setting::first();
        return view('front.contact',[
            'settings'=>$settings
        ]);
    }
}
