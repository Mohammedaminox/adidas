<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index',["categories"=>$categories]);
    }
    public function create(){
        return view('category.create');
    }
    public function store(Request $request)
{

    $request->validate([
        'name' => 'required'
    ]);

    $input = $request->all();

    Category::create($input);
    return redirect()->route('categories.index');
}
public function edit($id){
    $categories = Category::find($id);
    return view('category.edit',['categories'=>$categories]);
}
public function update(Request $request , $id){
    $categories = Category::find($id);
    $categories->update($request->all());
    
    return redirect()->route('categories.index');
}
public function delete(Request $request , $id){
    $categories = Category::find($id);
    $categories->delete($request->all());
    return redirect()->route('categories.index');

}
}
