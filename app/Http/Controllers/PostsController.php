<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = DB::table('posts')->where('slug', $slug)->first();
        dd($post);
        return view('post',[
            'post' => $post
        ]);
    }

    //add post controller
    public function writePost()
    {
        $category=DB::table('categories')->get();
        return view('post.writePost', compact('category'));
    }
    public function addPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:20|min:3',
            'details' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,PNG',
        ]);
        $data=array();
        $data['title']=$request->title;
        $data['categories_id']=$request->categories_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        if ($image){
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            $post=DB::table('posts')->insert($data);
            if ($post){
                return redirect()->route('show.post');
            }
        }
        else{
            $post=DB::table('posts')->insert($data);
            if ($post){
                return redirect()->route('show.post');
            }
        }
    }
    public function showPost()
    {
        //$post=DB::table('posts')->get();
        $post=DB::table('posts')
            ->join('categories','posts.categories_id','categories.id')
            ->select('posts.*','categories.name')
            ->get();
        //join 2 table
        return view('post.show_post', compact('post'));
    }
    public function viewPost($id)
    {
        $post=DB::table('posts')
            ->join('categories','posts.categories_id','categories.id')
            ->select('posts.*','categories.name')
            ->where('posts.id',$id)
            ->first();
        return view('post.post_view')->with('pt',$post);
    }
    public function editPost($id)
    {
        $post=DB::table('posts')->where('id',$id)->first();
        $category=DB::table('categories')->get();
        return view('post.edit_post', compact('category','post'));
    }
    public function updatePost(Request $request,$id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:200',
            'details' => 'required',
            'image' => ' mimes:jpeg,jpg,png,PNG',
        ]);
        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->categories_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_photo);
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Post Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }else{
            $data['image']=$request->old_photo;
            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Successfully Post Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }
        //$post=DB::table('posts')->where('id',$id)->update($value);
        //return redirect()->route('show.post');
    }

    public function deletePost($id)
    {
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->image;
        $delete=DB::table('posts')->where('id',$id)->delete();
        if ($delete) {
            unlink($image);
            return Redirect()->back();
        }
    }

}

