@extends('layouts.main')

@section('content')


    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{$user->name}}</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('welcome')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Agents</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{$user->name}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Agent Single Star /-->
    <section class="agent-single">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="agent-avatar-box">
                                <img src="{{asset('/').$user->image}}" alt="" width="80%" class="agent-avatar img-fluid">
                            </div>
                        </div>
                        <div class="col-md-5 section-md-t3">
                            <div class="agent-info-box">
                                <div class="agent-title">
                                    <div class="title-box-d">
                                        <h3 class="title-d">{{$user->name}}</h3>
                                    </div>
                                </div>
                                <div class="agent-content mb-3">
                                    <p class="content-d color-text-a">
                                        {{$user->about}}
                                    </p>
                                    <div class="info-agents color-a">
                                        <p>
                                            <strong>Status: </strong>
                                            <span class="color-text-a"> {{$user->status}} </span>
                                        </p>
                                        <p>
                                            <strong>Phone: </strong>
                                            <span class="color-text-a"> {{$user->phonenum}} </span>
                                        </p>
                                        <p>
                                            <strong>Mobile: </strong>
                                            <span class="color-text-a"> {{$user->mobilenum}}</span>
                                        </p>
                                        <p>
                                            <strong>Email: </strong>
                                            <span class="color-text-a">{{$user->email}}</span>
                                        </p>
                                        @if(isset(auth()->user()->id) == $user->id)
                                            @if(auth()->user()->id == $user->id)
                                        <p>
                                            <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary btn-sm">edit profile</a>
                                        </p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="socials-footer">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 section-t8">
                    <div class="title-box-d">
                        <h3 class="title-d">My Properties ({{$posts->count()}})</h3>
                    </div>
                </div>
                <div class="row property-grid grid">
                    <div class="col-sm-12">
                        <div class="grid-option">
                            <form>
                                <select class="custom-select">
                                    <option selected>All</option>
                                    <option value="1">New to Old</option>
                                    <option value="2">For Rent</option>
                                    <option value="3">For Sale</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    @foreach($posts as $post)
                        @if(isset(auth()->user()->id))
                          <div class="col-md-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="{{asset('/').$post->image1}}" alt="" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="#">{{$post->location}}
                                                <br /> {{$post->city}}</a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">rent | Rs {{$post->rent}}</span>
                                        </div>
                                        <a href="{{route('posts.show',$post->id)}}" class="link-a">Click here to view
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Area</h4>
                                                <span>{{$post->total_area}}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">City</h4>
                                                <span>{{$post->city}}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">status</h4>
                                                <span>{{$post->status}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @elseif($post->status == 'approved')
                            <div class="col-md-4">
                                <div class="card-box-a card-shadow">
                                    <div class="img-box-a">
                                        <img src="{{asset('img/property-1.jpg')}}" alt="" class="img-a img-fluid">
                                    </div>
                                    <div class="card-overlay">
                                        <div class="card-overlay-a-content">
                                            <div class="card-header-a">
                                                <h2 class="card-title-a">
                                                    <a href="#">{{$post->location}}
                                                        <br /> {{$post->city}}</a>
                                                </h2>
                                            </div>
                                            <div class="card-body-a">
                                                <div class="price-box d-flex">
                                                    <span class="price-a">rent | Rs {{$post->rent}}</span>
                                                </div>
                                                <a href="{{route('posts.show',$post->id)}}" class="link-a">Click here to view
                                                    <span class="ion-ios-arrow-forward"></span>
                                                </a>
                                            </div>
                                            <div class="card-footer-a">
                                                <ul class="card-info d-flex justify-content-around">
                                                    <li>
                                                        <h4 class="card-info-title">Area</h4>
                                                        <span>{{$post->total_area}}</span>
                                                    </li>
                                                    <li>
                                                        <h4 class="card-info-title">City</h4>
                                                        <span>{{$post->city}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--/ Agent Single End /-->
@endsection
