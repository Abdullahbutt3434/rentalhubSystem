@extends('layouts.app')

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>
{{--                        @if((Auth()->user()->status == 'registered'))--}}
{{--                            <div class="card-tools">--}}
{{--                                <a href="{{route('posts.create')}}" class="btn btn-sm btn-default">Add Post</a>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>email</th>
                                <th>status</th>
                                <th>verification</th>
                                <th>Approve User</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($user as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>{{$user->verified}}</td>

                                    <td>
                                        <form class="" action="{{route('approveUser',$user->id)}}" method="GET" style="float: left">
                                            <input type="submit" class="btn btn-primary " name="verified" value="approve">
                                        </form>

                                        <form class="ml-5" action="{{route('blockUser',$user->id)}}" method="GET" style="float: left">
                                            <input type="submit" class="btn btn-dark  " name="verified" value="block">
                                        </form>
                                    </td>
                                    <td>
                                        <form  action="{{route('users.destroy', $user->id)}}" method="POST">
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
