<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class HomeController extends Controller
{
    //
    function index(){
        return view('admin.index');
    }
}
