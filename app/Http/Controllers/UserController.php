<?php

namespace App\Http\Controllers;

use App\Mail\ProfileApprovalMail;
use App\Mail\ProfileRejectionMail;
use App\Mail\RejectMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'edit','update','destroy','approveUser','blockUser']);
        $this->middleware('isAdmin')->only(['index','destroy','approveUser','blockUser']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->where('status','registered')->get();
        return view('users.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('id',$id)->get();
        return view('users.edit')->with('user',$user[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->hasFile('image')){

            $image = Storage::disk('public')->put('ProfileImage', $request->image);
            $user = User::where('id', $request->id)
                ->update([
                    'name'=> $request->name,
                    'phonenum'=>$request->phonenum,
                    'mobilenum'=>$request->mobilenum,
                    'about'=>$request->about,
                    'image'=>$image

                ]);
            session()->flash('success','User Successfully updated');
        }else{
            $user = User::where('id', $request->id)
                ->update([
                'name'=> $request->name,
                'phonenum'=>$request->phonenum,
                'mobilenum'=>$request->mobilenum,
                'about'=>$request->about,

            ]);
            session()->flash('success','User Successfully updated');

        }


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

        $user = User::find($id);

        $user->Delete();
        session()->flash('success','User deleted Successfully');
        return redirect()->back();

    }
    public function approveUser($id){
        $user = User::find($id);
        $users = User::where('id',$id)->get();

        if ($users[0]->verified == "approved") {
            session()->flash("error", "User already approved");
        } else{
            $user->update([
                'verified' => 'approved'
            ]);

            Mail::to($users[0]->email)->send(new ProfileApprovalMail());
            session()->flash("success", "User approved successfully");
        }
        return redirect()->back();
    }
    public function blockUser($id){
        $user = User::find($id);
        $users = User::where('id',$id)->get();

        if ($users[0]->verified == "rejected") {
            session()->flash("error", "User already rejected");
        } else{
            $user->update([
                'verified' => 'rejected'
            ]);
//            $data = [
//                'name' => 'ali',
//                'message'=>'this post is approved'
//            ];
//            $post = DB::table('posts')->where('id',$id)->get();
//            $user = DB::table('users')->where('id',$post[0]->user_id)->get();
            Mail::to($users[0]->email)->send(new ProfileRejectionMail());
            session()->flash("success", "User rejected successfully");
        }
        return redirect()->back();
    }

    public function profile($id){
//        $user= DB::table('users')->where('id',$id)->get();
        $user= User::where('id', $id)->get();
        $post =$user[0]->posts;
        return view('users.profile')->with([
            'user' =>$user[0],
            'posts'=>$post]);
    }
}
