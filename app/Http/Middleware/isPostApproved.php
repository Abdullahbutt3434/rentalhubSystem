<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class isPostApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        || auth()->user()->status == "admin"
        $postID = $request->route()->parameters['post'];
        $postStatus = Post::where('id',$postID)->pluck('status');
        $userID = Post::where('id',$postID)->pluck('user_id');
        if($postStatus[0] == "approved"){
            return $next($request);
        }else if ( $postStatus[0] == "pending" && auth()->user()){
            if (auth()->user()->status == "admin" || auth()->user()->id == $userID[0])
            return $next($request);
        }else{
            return redirect()->back();
        }

    }
}
