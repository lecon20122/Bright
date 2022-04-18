@extends('layouts.home')

@section('content')
    <Style>

    </style>
    <div class="container ">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner ">
                <div class="carousel-item image-slideshow ">
                    <img src="{{ asset('images/slide1s.jpg') }}" class="d-block w-100" alt="slide1">
                </div>
                <div class="carousel-item active image-slideshow">
                    <img src="{{ asset('images/pexels-sharon-mccutcheon-1148998.jpg') }}" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                    data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                    data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div> <!--container -->

@endsection




