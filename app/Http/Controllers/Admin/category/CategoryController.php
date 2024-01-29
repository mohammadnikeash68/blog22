<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('admin.category.index',compact('categories'));
    }
    public function create(){
        $cats = Category::all();
        return view('admin.category.create',compact('cats'));
    }
    public function store(Request $request){
        Category::create($request->except('_token'));
        return redirect()->route('admin.category.index')->with('success','دسته بندی با موفقیت ثبت گردید');
    }
    public function destroy(Category $category,Request $request){
        $delete = $category->delete();
        if($delete){

        }
    }
}
