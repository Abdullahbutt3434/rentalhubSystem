<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Couchbase\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
        $title = $request->keyword;
        $category = $request->category;
        $city = $request->city;
        $rent = $request->rent;
        $date = $request->date;
        $post = null;
//        dd($title);
        if($title !=null && $city == null && $category == null && $rent == null && $date ==null ){
            $post =  DB::table('posts')
                ->where('title', 'LIKE', "%{$title}%")
                ->orWhere('city', 'LIKE', "%{$title}%")
                ->orWhere('location', 'LIKE', "%{$title}%")
                ->where('status','approved')
                ->get();

        }
        if($title ==null && $city != null && $category == null && $rent == null && $date ==null ){
            $post =  Post::query()
                ->where('city', '=', $city)
                ->where('status','approved')
                ->get();
        }
        if($title ==null && $city == null && $category != null && $rent == null && $date ==null ){
            $post =  Post::query()
                ->where('category_id', '=', $category)
                ->where('status','approved')
                ->get();
        }
        if($title ==null && $city == null && $category == null && $rent != null && $date ==null ){
            $post =  Post::query()
                ->where('rent', '<=', (int)$rent)
                ->where('status','approved')
                ->get();

        }
        if($title ==null && $city == null && $category == null && $rent == null && $date !=null ){
            $postall = DB::table('posts')->where('status','approved')->get();
            $post = array();
            foreach ($postall as $data){
                $newtime = explode(' ',$data->updated_at);
                if($newtime[0] == $date){
                    array_push($post,$data);
                }
            }
        }
        if($title ==null && $city != null && $category != null && $rent == null && $date ==null ){
            $post =  DB::table('posts')
                ->where('city',  $city)
                ->where('category_id',  $category)
                ->where('status','approved')
                ->get();
        }
        if($title ==null && $city != null && $category != null && $rent != null && $date ==null ){
            $post =  DB::table('posts')
                ->where('city',  $city)
                ->where('category_id',  $category)
                ->where('rent','<=', (int)$rent )
                ->where('status','approved')
                ->get();
        }
        if($title ==null && $city != null && $category == null && $rent != null && $date ==null ){
            $post =  DB::table('posts')
                ->where('city',  $city)
                ->where('rent','<=', (int)$rent )
                ->where('status','approved')
                ->get();
        }
        if($title ==null && $city != null && $category == null && $rent != null && $date ==null ){
            $post =  DB::table('posts')
                ->where('city',  $city)
                ->where('rent','<=', (int)$rent )
                ->where('status','approved')
                ->get();
        }
//        else{
//            $post =  DB::table('posts')
//                ->orwhere('title',  $title)
//                ->orwhere('city',  $city)
//                ->orwhere('rent','<=', (int)$rent )
//                ->orwhere('status','approved')
//                ->get();
//        }






        $categories = DB::table('categories')->get();

        return view('posts.properties')->with([
            'categories'=>$categories,
            'posts'=>$post]);
    }

    public function SearchUser(Request $request){
        $post =Post::where('user_id',$request->id)->get();
        return view('posts.index')->with('posts',$post);
    }
}
