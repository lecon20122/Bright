@extends('site.layout.site')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">School Classes</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                    eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            @foreach ($doctors as $doctor)
                <div class="row g-4">
                    {{-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="classes-item">
                    <div class="bg-light rounded-circle w-75 mx-auto p-3">
                        <img class="img-fluid rounded-circle" src="img/classes-1.jpg" alt="">
                    </div>
                    <div class="bg-light rounded p-4 pt-5 mt-n5">
                        <a class="d-block text-center h3 mt-3 mb-4" href=""></a>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle flex-shrink-0" src="" alt=""
                                    style="width: 45px; height: 45px;">
                                <div class="ms-3">
                                    <h6 class="text-primary mb-1">{{ $doctor->name }}</h6>
                                    <small>Teacher</small>
                                </div>
                            </div>
                            <span class="bg-primary text-white rounded-pill py-2 px-3" href="">{{ $doctor->price }}</span>
                        </div>
                        <div class="row g-1">
                            <div class="col-4">
                                <div class="border-top border-3 border-primary pt-2">
                                    <h6 class="text-primary mb-1">Address:</h6>
                                    <small>{{ $doctor->address }}</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border-top border-3 border-success pt-2">
                                    <h6 class="text-success mb-1">Time:</h6>
                                    <small>9-10 AM</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border-top border-3 border-warning pt-2">
                                    <h6 class="text-warning mb-1">Capacity:</h6>
                                    <small>30 Kids</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
                    <div class="card mb-3 mx-auto w-100" style="width: 952px;">
                        <div class="row">
                            <div class="col-md-4 p-0 m-0" style="height: 400px;">
                                <img src="{{ asset('site/img/team-4.jpg') }}" alt="Trendy Pants and Shoes"
                                    class=" rounded-start" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><small>Doctor / </small> {{ $doctor->name }}</h5>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <p class="card-text">
                                                {{ $doctor->description }}
                                            </p>
                                            <p class="card-text">
                                                <small class="text-muted">Last updated 3 mins ago</small>
                                            </p>
                                            <h4 class="text-success">
                                                {{ $doctor->price }} EGP
                                            </h4>
                                            <h4 class="card-text">
                                                <small class="text-muted"><i class="fas fa-stopwatch text-warning"></i>
                                                    {{ $doctor->wait_time }}</small>
                                            </h4>
                                            <h4 class="card-text">
                                                <small class="text-muted"><i
                                                        class="fas fa-map-marked-alt text-danger"></i>
                                                    {{ $doctor->address }}</small>
                                            </h4>

                                        </div>
                                        <div class="col-lg-6">
                                            <label for="">Doctor Schedule</label>
                                            <select class="form-control" name="category_id"
                                                id="exampleFormControlSelect1">
                                                @foreach ($doctor->reservationTime as $appointiment)
                                                    <optgroup label="{{ $appointiment->reservationDay->day }}">
                                                        <option value="">from {{ $appointiment->from }} to
                                                            {{ $appointiment->to }}</option>
                                                    </optgroup>
                                                @endforeach
                                            </select>
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
@endsection
