@extends('layouts.app')

@section('content')
    <section class="content">
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-12">
                        <div class="card card-warning ">
                            <div class="card-header">
                                <h3 class="card-title" id="setName">Post details</h3>
                            </div>
                            <!-- /.card-header -->
                            <input type="hidden" name="user_id" value="{{auth()->id()}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>User name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" name="name" placeholder="Enter ...">
                                            <input type="text" class="form-control" value="{{$user->id}}" name="id" hidden>
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>email</label>
                                            <input type="text" value="{{$user->email}}" disabled class="form-control" name="email" placeholder="Enter ...">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>About</label>
                                            <textarea type="text" class="form-control @error('about') is-invalid @enderror" name="about" >
                                                {{$user->about}}
                                            </textarea>
                                        </div>
                                        @error('description')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>phone number</label>
                                            <input type="text" class="form-control" name="phonenum" value="{{$user->phonenum}}" placeholder="Enter ...">
                                        </div>
                                        @error('phonenum')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>mobile number</label>
                                            <input type="text" class="form-control"  value="{{$user->mobilenum}}" name="mobilenum" placeholder="Enter ...">
                                        </div>
                                        @error('mobilenum')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="exampleInputFile">Display Profile</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('image')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                            <input type="submit" class="btn btn-primary mt-4" name="Update" value="Update" placeholder="Enter ...">
                                        @error('area')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <input type="submit" class="btn btn-success ml-auto">

                    </div>
            </form>
    </section>
@endsection
