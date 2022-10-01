@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Post</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{isset($post) ? route('posts.update' ,$post->id):route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Post Category</label>
                            <select class="form-control select2" name="cat_id" style="width: 100%;" onchange="showDiv(this)">
                                @foreach($category as $category )
                                    <option value="{{$category->id}}" id="cat_name">{{$category->name}}</option>
                                @endforeach()
                            </select>
                        </div>

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
                                                <label>Post title</label>
                                                <input type="text" value="{{isset($post->title) ? $post->title : '' }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter ...">
                                             </div>
                                            @error('title')
                                            <div class="alert alert-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Post Description</label>
                                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" >
                                            {{isset($post->description) ? $post->description: ''}}
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
                                                <label>Location</label>
                                                <input type="text" class="form-control" value="{{isset($post->location) ? $post->location:''}}" name="location" placeholder="Enter ...">
                                            </div>
                                            @error('location')
                                            <div class="alert alert-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>city</label>
                                                <input type="text" value="{{isset($post->city) ? $post->city:''}}" class="form-control" name="city" placeholder="Enter ...">
                                            </div>
                                            @error('city')
                                            <div class="alert alert-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                <!-- text input -->
                                          <div class="form-group">
                                                <label>Rent</label>
                                                <input type="text" class="form-control" value="{{isset($post->rent) ?$post->rent:''}}"  name="rent" placeholder="Enter ...">
                                          </div>
                                            @error('rent')
                                            <div class="alert alert-danger ">{{ $message }}</div>
                                            @enderror
                                    </div>
                                        <div class="col-sm-6">
                                <!-- text input -->
                                          <div class="form-group">
                                                <label>Condition</label>
                                                <input type="text" class="form-control" value="{{isset($post->condition) ? $post->condition:''}}" name="condition" placeholder="Enter ...">
                                          </div>
                                            @error('condition')
                                            <div class="alert alert-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Tota area (sq/ft)</label>
                                                <input type="text" class="form-control" value="{{isset($post->condition) ? $post->total_area: ''}}"  name="area" placeholder="Enter ...">
                                            </div>
                                            @error('area')
                                            <div class="alert alert-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="exampleInputFile">Add Image 1</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image1" value="{{isset($post) ? asset('/').$post->image1:''}}" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('image')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="exampleInputFile">Add Image 2</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image2" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('image2')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label for="exampleInputFile">Add Image 3</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="image3"  value="{{isset($post) ? $post->image3:''}}" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('image3')
                                            <div class="alert alert-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>amenities</label>
                                            <select class="select3" name="amenities[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                                @if(isset($amenities))
                                                    @foreach($amenities as $amenities)
                                                        <option selected class="bg bg-blue text-primary" >{{$amenities}}</option>
                                                    @endforeach
                                                @endif
                                                <option >Balcony</option>
                                                <option>Outdoor</option>
                                                <option>Kitchen</option>
                                                <option>Cable Tv</option>
                                                <option>Deck</option>
                                                <option>Tennis Courts</option>
                                                <option>Internet</option>
                                                <option>Parking</option>
                                                <option>garage</option>
                                                <option>Concrete Flooring</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-4 float-left" id="fh1" style="display: none">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Bedroom</label>
                                            <input type="text" class="form-control" name="bedroom" placeholder="Enter ...">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 float-left" id="fh2"  style="display: none">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Bathroom</label>
                                            <input type="text" class="form-control" name="bathroom" placeholder="Enter ...">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 float-left" id="fh3"  style="display: none">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Kitchen</label>
                                            <input type="text"  class="form-control" name="kitchen" placeholder="Enter ...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <input type="submit" value="{{isset($post)? "update" : "submit"}}" class="btn btn-success ml-auto">
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>


    <script type="text/javascript">

    function showDiv(select){
        if(select.value==="2" || select.value==="3"){

            document.getElementById('fh1').style.display = "block";
            document.getElementById('fh2').style.display = "block";
            document.getElementById('fh3').style.display = "block";

        }else if(select.value=="1" || select.value=="4"){
            // document.getElementById('divhouse').className = "row";
            document.getElementById('fh1').style.display = "none";
            document.getElementById('fh2').style.display = "none";
            document.getElementById('fh3').style.display = "none";
        }
        else{
        }

    }
    $(function () {
        //Initialize Select2 Elements
        $('.select3').select2()
    })
    </script>

@endsection

