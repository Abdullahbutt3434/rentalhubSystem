<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified'])->only('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::all()->count();
        $postpending = Post::where('status','pending')->count();
        $user = User::where('status','registered')->count();
        $categories = Category::all()->count();


        $postu =DB::table('posts')->where('user_id',auth()->user()->id)->get()->count();
        $postpendingu = Post::where('status','pending')
            ->where('user_id',auth()->user()->id)
            ->get()->count();
        $postapprove = Post::where('status','approved')
            ->where('user_id',auth()->user()->id)
            ->get()->count();
        $postrejected = Post::where('status','rejected')
            ->where('user_id',auth()->user()->id)
            ->get()->count();

        return view('home')->with([
            'post'=>$post,
            'user'=>$user,
            'category'=>$categories,
            'postpending'=>$postpending,
            'postu'=>$postu,
            'postpendingu'=>$postpendingu,
            'postapprove'=>$postapprove,
            'postrejected'=>$postrejected,
            ]);
    }

    public function welcome()
    {
        $post = DB::table('posts')->where('status','approved')->get();
        $user = DB::table('users')->where('status','registered')->get();
        $posts = DB::table('posts')->where('status','approved')->get()->take(3);
        $categories = DB::table('categories')->get();

        return view('welcome')->with([
            'posts'=>$posts,
            'p'=>$post,
            'agents'=>$user,
            'categories'=>$categories,
        ]);
    }

}
