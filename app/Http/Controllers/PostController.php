<?php

namespace App\Http\Controllers;

use App\Mail\ApproveMail;
use App\Mail\RejectMail;
use App\Mail\SendMail;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\Posts\CreatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['index','create','store','edit','update','destroy']);
        $this->middleware('isAdmin')->only(['approvePost','disapprove']);
        $this->middleware('isPostApproved')->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $id = Auth::user()->id;
        if (Auth::user()->status == "registered"){

            $user= Post::where('user_id',$id)->get();

            return(view('posts.index'))->with('posts',$user  );


        }else if (Auth::user()->status == "admin"){
            $post= Post::all()->sortByDesc('status');

            return(view('posts.index'))->with('posts',$post);

        }else{
            return redirect()->back();
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('category',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        if ($request->amenities!= null)
            $amenity = implode(',',$request->amenities);

        if($request->hasFile('image1') && $request->hasFile('image2') && $request->hasFile('image3') ){
            $image1 = Storage::disk('public')->put('PostImg', $request->image1);
            $image2 = Storage::disk('public')->put('PostImg', $request->image2);
            $image3 = Storage::disk('public')->put('PostImg', $request->image3);

        }else{
            session()->flash('error','image is missing in post');
            return redirect()->back();
        }

       $post = Post::create([
            'title'=>$request->title,
            'location'=>$request->location,
            'total_area'=>$request->area,
            'rent'=>$request->rent,
            'description'=>$request->description,
            'condition'=>$request->condition,
            'city'=>$request->city,
            'image1'=>$image1,
            'image2'=>$image2,
            'image3'=>$image3,
            'status'=>'pending',
            'bedroom'=>$request->bedroom,
            'bathroom'=>$request->bathroom,
            'kitchen'=>$request->kitchen,
            'category_id'=>$request->cat_id,
            'user_id'=>$request->user_id,
           'amenities'=>$amenity

        ]);
        $user = User::find($request->user_id);
        $category= Category::find($request->cat_id);
        $category->posts()->attach([$post->id]);
        $user->posts()->attach([$post->id]);

        session()->flash('success','Post added successfully wait for approval');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = DB::table('posts')->where('id',$id)->get();
        $category = DB::table('categories')->where('id',$post[0]->category_id)->get();
        $user = DB::table('users')->where('id',$post[0]->user_id)->get();
        $amenities = explode(',',$post[0]->amenities);
        return view('posts.show')->with([
            'post'=>$post[0],
            'category'=>$category[0],
            'user'=>$user[0],
            'amenities' =>$amenities

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {

        $post = DB::table('posts')->where('id',$id)->get();
        $category = DB::table('categories')->where('id',$post[0]->category_id)->get();
        $amenities  = explode(',',$post[0]->amenities);

        return view('posts.create')->with([
            'post'=> $post[0],
            'amenities' => $amenities,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = DB::table('posts')->where('id',$id)->get();
        $image1 = $post[0]->image1;
        $image2 = $post[0]->image2;
        $image3 = $post[0]->image3;

        if ($request->amenities!= null) {
            $amenity = implode(',', $request->amenities);
        }
        if($request->hasFile('image1')) {
            $image1 = Storage::disk('public')->put('PostImg', $request->image1);
        }
        if ($request->hasFile('image2')){
            $image2 = Storage::disk('public')->put('PostImg', $request->image2);
        }
        if ($request->hasFile('image3')){
            $image3 = Storage::disk('public')->put('PostImg', $request->image3);

        }

            $post = Post::where('id',$id)->update([
                'title'=>$request->title,
                'location'=>$request->location,
                'total_area'=>$request->area,
                'rent'=>$request->rent,
                'description'=>$request->description,
                'condition'=>$request->condition,
                'city'=>$request->city,
                'image1'=>$image1,
                'image2'=>$image2,
                'image3'=>$image3,
                'status'=>"pending",
                'bedroom'=>$request->bedroom,
                'bathroom'=>$request->bathroom,
                'kitchen'=>$request->kitchen,
                'category_id'=>$request->cat_id,
                'user_id'=>$request->user_id,
                'amenities'=>$amenity
            ]);


        session()->flash('success','Post updated Successfully');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::find($id);

        $post->Delete();
        session()->flash('success','Post deleted Successfully');
        return redirect()->back();

    }

    public function approvePost($id)
    {
        $post = Post::find($id);
        if ($post->status == "approved") {
            session()->flash("error", "Post already approved");
        } else{
            $post->update([
                'status' => 'approved'
            ]);
            $data = [
                'name' => 'ali',
                'message'=>'this post is approved'
            ];
            $post = DB::table('posts')->where('id',$id)->get();
            $user = DB::table('users')->where('id',$post[0]->user_id)->get();


        Mail::to($user[0]->email)->send(new ApproveMail($data));
        session()->flash("success", "Post approve successfully to website");
    }
        return redirect()->back();

    }

    public function disapprove($id)
    {
        $post = Post::find($id);
        if ($post->status == "rejected") {
            session()->flash("error", "Post already Rejected");
        } else{
            $post->update([
                'status' => 'rejected'
            ]);
            $data = [
                'name' => 'ali',
                'message'=>'this post is approved'
            ];

            $post = DB::table('posts')->where('id',$id)->get();
            $user = DB::table('users')->where('id',$post[0]->user_id)->get();

            Mail::to($user[0]->email)->send(new RejectMail($data));

        session()->flash("success", "Post rejected successfully to website");
    }

        return redirect()->back();

    }

    public function propertiesIndex(){
        $post = DB::table('posts')->where('status','approved')->get();
        $categories = DB::table('categories')->get();
        return view('posts.properties')->with([
            'categories'=>$categories,
            'posts'=>$post]);
    }

}
