<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    //category controller
    public function addCategory()
    {
        return view('post.add_category');
    }

    public function storeCategory(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required|unique:categories|max:20|min:3',
            'slug' => 'required|unique:categories|max:50|min:4',
        ]);                                                     //validation of inserted data
        $data=array();
        $data['name']= $req->name;
        $data['slug']=$req->slug;
        $category=DB::table('categories')->insert($data);
        if($category==true){
            return redirect()->route('show.category');
        }
    }
    public function showCategory()
    {
        $category=DB::table('categories')->get();
        return view('post.show_category', compact('category'));
    }
    public function viewCategory($id)
    {
        $category=DB::table('categories')->where('id',$id)->first();
        return view('post.category_view')->with('cat',$category);
    }
    public function deleteCategory($id)
    {
        $category=DB::table('categories')->where('id',$id)->delete();
        return redirect()->back();  //reload kore same page a e thakbe
    }
    public function editCategory($id)
    {
        $category=DB::table('categories')->where('id',$id)->first();
        return view('post.edit_category')->with('cat',$category);
    }
    public function updateCategory(Request $req,$id)
    {
        $value=array();
        $value['name']=$req->name;
        $value['slug']=$req->slug;
        $category=DB::table('categories')->where('id',$id)->update($value);
        return redirect()->route('show.category');
    }
}
