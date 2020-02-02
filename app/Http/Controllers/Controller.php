<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function picture()
    {
        $post=DB::table('posts')
            ->join('categories','posts.categories_id','categories.id')
            ->select('posts.*','categories.name')
            ->get();
        return view('picture')->with('pt',$post);
    }
    public function index()
    {
        $post=DB::table('posts')
            ->join('categories','posts.categories_id','categories.id')
            ->select('posts.*','categories.name')
            ->paginate(2);
        return view('index', compact('post'));
    }
}
