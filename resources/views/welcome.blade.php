@extends('layouts.main')

@section('content')

    <!--/ Carousel Star /-->
    <div class="intro intro-carousel">
        <div id="carousel" class="owl-carousel owl-theme">

            @foreach($posts as $post)
            <div class="carousel-item-a intro-item bg-image" style="background-image: url({{asset('/').$post->image1}})">
                <div class="overlay overlay-a"></div>
                <div class="intro-content display-table">
                    <div class="table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="intro-body">
                                        <p class="intro-title-top">{{$post->title}}</p>
                                        <h1 class="intro-title mb-4">
                                            <span class="color-b">{{$post->location}}</span>
                                            <br> {{$post->city}}</h1>
                                        <p class="intro-subtitle intro-price">
                                            <a href="{{route('posts.show',$post->id)}}"><span class="price-a">rent | Rs {{$post->rent}}</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!--/ Carousel end /-->

    <!--/ Property Star /-->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Latest Properties</h2>
                        </div>
                        <div class="title-link">
                            <a href="property-grid.html">All Property
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">
                @foreach($p as $post)
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <div class="img-box-a">
                            <img src="{{asset('/').$post->image1}}" alt="" class="img-a img-fluid">
                        </div>
                        <div class="card-overlay">
                            <div class="card-overlay-a-content">
                                <div class="card-header-a">
                                    <h2 class="card-title-a">
                                        <a href="#">{{$post->location}}
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
                                            <span>{{$post->total_area}} sq/ft</span>
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
                @endforeach
            </div>
        </div>
    </section>
    <!--/ Property End /-->

    <!--/ Agents Star /-->
    <section class="section-agents section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Best Agents</h2>
                        </div>
                        <div class="title-link">
                            <a href="agents-grid.html">All Agents
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($agents as $agent)

                <div class="col-md-4">

                    <div class="card-box-d">
                        <div class="card-img-d">
                            <img src="{{asset('/').$agent->image}}" style="height: 400px" alt="" class="img-d img-fluid">
                        </div>
                        <div class="card-overlay card-overlay-hover">
                            <div class="card-header-d">
                                <div class="card-title-d align-self-center">
                                    <h3 class="title-d">
                                        <a href="{{route('users.profile',$agent->id)}}" class="link-two">{{$agent->name}}</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body-d">
                                <p class="content-d color-text-a">
                                    {{$agent->about}}
                                </p>
                                <div class="info-agents color-a">
                                    <p>
                                        <strong>Phone: </strong> {{$agent->phonenum}}</p>
                                    <p>
                                        <strong>Email: </strong> {{$agent->email}}</p>
                                </div>
                            </div>
                            <div class="card-footer-d">
                                <div class="socials-footer d-flex justify-content-center">
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
                @endforeach

            </div>

        </div>
    </section>
    <!--/ Agents End /-->
@endsection
