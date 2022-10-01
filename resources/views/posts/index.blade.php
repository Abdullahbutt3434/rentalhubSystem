@extends('layouts.app')

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Posts</h3>

                        @if((Auth()->user()->status == 'admin'))
                        <div class="card-tools">
                            <form action="{{route('SearchUser')}}" method="GET">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" name="id" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                        @endif
                        @if((Auth()->user()->status == 'registered'))
                        <div class="card-tools">
                            <a href="{{route('posts.create')}}" class="btn btn-sm btn-default">Add Post</a>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 350px;">

                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>User</th>
                                <th>Status</th>
                                <th></th>
                                <th>Delete Post</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $posts)
                                <tr>
                                    <td>{{$posts->id}}</td>
                                    <td><a href="{{route('posts.show',$posts->id)}}">{{$posts->title}}  </a></td>
                                    <td>{{$posts->category->name}}</td>
                                    <td>{{$posts->user->name}}</td>
                                    <td>{{$posts->status}}</td>
                                    @if(auth()->user()->status=='admin')
                                    <td>
                                        <form class="" action="{{route('approvePost',$posts->id)}}" method="GET" style="float: left">
                                            <input type="submit" class="btn btn-primary " name="status" value="approve">
                                        </form>

                                        <form class="ml-5" action="{{route('disapprove',$posts->id)}}" method="GET" style="float: left">
                                            <input type="submit" class="btn btn-dark  " name="status" value="reject">
                                        </form>
                                    </td>
                                    @endif

                                    @if(auth()->user()->status == 'registered')
                                        <td>
                                        <a href="{{route('posts.edit',$posts->id)}}" class="btn btn-primary">Update</a>
                                        </td>
                                    @endif

                                    <td>
                                    <form  action="{{route('posts.destroy', $posts->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="submit" class="btn btn-danger " value="Delete" style="float: left">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
    </section>
@endsection
