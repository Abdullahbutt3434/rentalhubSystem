@extends('layouts.main')

@section('content')

    !--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{$post->title}}</h1>
                        <span class="color-text-a">{{$post->city}}</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('welcome')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('propertiesIndex')}}">Properties</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{$post->title}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Property Single Star /-->
    <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                        <div class="carousel-item-b">
                            <img src="{{asset('/').$post->image1}}" style="width: 1110px; height: 500px " alt="">
                        </div>
                        <div class="carousel-item-b">
                            <img src="{{asset('/').$post->image2}}" style="width: 1110px; height: 500px " alt="">
                        </div>
                        <div class="carousel-item-b">
                            <img src="{{asset('/').$post->image3}}" style="width: 1110px; height: 500px " alt="">
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="property-price d-flex justify-content-center foo">
                                <div class="card-header-c d-flex">
                                    <div class="card-box-ico">
                                        <span class="ion-money">Rs</span>
                                    </div>
                                    <div class="card-title-c align-self-center">
                                        <h5 class="title-c">{{$post->rent}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="property-summary">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d section-t4">
                                            <h3 class="title-d">Quick Summary</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list">
                                        <li class="d-flex justify-content-between">
                                            <strong>Property ID:</strong>
                                            <span>{{$post->id}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Location:</strong>
                                            <span>{{$post->location." "}}{{$post->city}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Property Type:</strong>
                                            <span>{{$category->name}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Status:</strong>
                                            <span>Rent</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Area:</strong>
                                            <span>{{$post->total_area}} sq/ft</span>
                                        </li>

                                        @if($post->bedroom != null)
                                            <li class="d-flex justify-content-between">
                                                <strong>Beds:</strong>
                                                <span>{{$post->bedroom}}</span>
                                            </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Baths:</strong>
                                            <span>{{$post->bathroom}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>kitchen:</strong>
                                            <span>{{$post->kitchen}}</span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 section-md-t3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Property Description</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="property-description">
                                <p class="description color-text-a">
                                    {{$post->description}}
                                </p>
                            </div>
                            <div class="row section-t3">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Amenities</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-list color-text-a">
                                <ul class="list-a no-margin">
                                    @foreach( $amenities as $amenities)
                                        <li class="mr-5">{{$amenities }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row section-t3">
                        <div class="col-sm-12">
                            <div class="title-box-d">
                                <h3 class="title-d">Contact Agent</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <img src="{{asset('/').$user->image}}" alt="" width="80%" class="img-fluid">
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="property-agent">
                                <h4 class="title-agent">{{$user->name}}</h4>
                                <p class="color-text-a">
                                    {{$user->about}}
                                </p>
                                <ul class="list-unstyled">
                                    <li class="d-flex justify-content-between">
                                        <strong>Phone:</strong>
                                        <span class="color-text-a">{{$user->phonenum}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Mobile:</strong>
                                        <span class="color-text-a">{{$user->mobilenum}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Email:</strong>
                                        <span class="color-text-a">{{$user->email}}</span>
                                    </li>
                                </ul>
                                <div class="socials-a">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
