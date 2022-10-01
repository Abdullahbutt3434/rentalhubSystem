@extends('layouts.app')

@section('content')

    <div class="col-md-12 pl-3 pr-3">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{isset($category) ? 'Edit Category ' : 'Add Category'}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store')}}" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Add Category</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="category name" name="name"value ="{{ isset($category) ? $category->name : ''}}">
                        @error('name')
                        <div class="alert alert-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="{{ isset($category) ? 'Update Category ' : 'Add Category'}}">
                </div>
            </form>
        </div>
    </div>
@endsection
