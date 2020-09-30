<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    //go to add category view
    function category(){
        return view('admin.category.addcategory');
    }
    function create(Request $request){
        $data=$request->validate([
            'name'=>'required|string|min:3|max:100'
        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->save();
        return redirect(route('admin.home'));
    }
    //show category list
    function categoryList(){
        $categories=Category::get();
        return view('admin.category.category',[
            'categories'=>$categories
        ]);
    }
    //go to add category view
    function Editcategory($id){
        $category=Category::findOrFail($id);
        return view('admin.category.editcategory',[
            'category'=>$category
        ]);
    }
    function Update($id,Request $request){
        $data=$request->validate([
            'name'=>'required|string|min:3|max:100'
        ]);
        //extractDatafromForm
        $_name=$request->name;
        $category=Category::findOrFail($id);
        $category->name=$_name;
        $category->save();
        return redirect(route('admin.category.list'));
    }
    //delete category
    function delete($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect(route('admin.category.list'));
    }
    
}
