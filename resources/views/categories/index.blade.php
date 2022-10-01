@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Post count</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->posts->count()}}</td>
                                            <input type="hidden" class="delete_val_id" value="{{$category->id}}">
                                            <td><a href="{{route('categories.edit',$category->id)}}"  class="btn btn-primary btm-small">Edit</a>
                                                <a class="btn btn-danger text-white" onclick="handleDelete({{$category->id}})" > Delete</a></td>
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
            </div>
            <!-- /.card-body -->
            <div class="card-footer d-flex justify-content-center">
                <a href="{{route('categories.create')}}" class="btn-primary btn-sm "> Add Category</a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        <div class="modal fade" id="deletemodel" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form  id="deleteCategoryForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this..
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Go Back</button>
                            <button type="submit" class="btn btn-danger" href="">Yes Delete</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        @endsection
        @section('script')
            <script>

                function handleDelete(id){
                    var forms = document.getElementById('deleteCategoryForm')
                    forms.action = '/categories/'+ id
                    $('#deletemodel').modal('show')
                }

            </script>
    </section>
    <!-- /.content -->

@endsection
