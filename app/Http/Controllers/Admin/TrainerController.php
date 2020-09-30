<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trainer;
class TrainerController extends Controller
{
    
    //show Trainer list
    function trainerList(){
        $trainers=Trainer::get();
        return view('admin.trainer.trainer',[
            'trainers'=>$trainers
        ]);
    }

    //go to add Trainer view
    function trainer(){
        return view('admin.trainer.addtrainer');
    }
    //addTrainer in DB
    function create(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:100|min:3',
            'phone'=>'required||string|max:100|min:11',
            'specialization'=>'required||string|max:100|min:3',
            'img'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //handle image
        if ($request->hasFile('img'))
        {
            $image = $request->file('img'); 
            $name = time().\Str::random(30).'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('asset/img/trainers/'); 
            $image->move($destinationPath, $name);
            $imageName='asset/img/trainers/'.$name; 
        }
        //extract data from form
        $_name=$request->name;
        $_phone=$request->phone;
        $_specialization=$request->specialization;

        //insert data into DB
        $trainer=new Trainer();
        $trainer->name=$_name;
        $trainer->phone=$_phone;
        $trainer->specialization=$_specialization;
        $trainer->img=$imageName;

        $trainer->save();
        return redirect(route('admin.trainer.list'));
    }


    //Edit Trainer
    function edit($id){
        $trainer=Trainer::findOrFail($id);
        return view('admin.trainer.edittrainer',[
            'trainer'=>$trainer
        ]);
    }
    function update($id,Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:100|min:3',
            'phone'=>'required|string|max:100|min:11',
            'specialization'=>'required|string|max:100|min:3',
            'img'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //extract data from form
        $_name=$request->name;
        $_phone=$request->phone;
        $_specialization=$request->specialization;

        $trainer=Trainer::findOrFail($id);
        $trainer->name=$_name;
        $trainer->phone=$_phone;
        $trainer->specialization=$_specialization;
        //handle image
        if ($request->hasFile('img'))
        {
            $image = $request->file('img'); 
            $name = time().\Str::random(30).'.'.$image->getClientOriginalExtension(); 
            $destinationPath = public_path('asset/img/trainers/'); 
            $image->move($destinationPath, $name);
            $imageName='asset/img/trainers/'.$name;
             //check if has image 
            if(isset($trainer->img)){
                unlink($trainer->img);
            }
            $trainer->img=$imageName; 
        }
        $trainer->save();
        return redirect(route('admin.trainer.list'));
    }



    //delete Trainer
    function delete($id){
        //get record from DB
        $trainer=Trainer::find($id);
        if(isset($trainer->img)){
            unlink($trainer->img);
        }
        $trainer->delete();
        return redirect(route('admin.trainer.list'));
    }

}
