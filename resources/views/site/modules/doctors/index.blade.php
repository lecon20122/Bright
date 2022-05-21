@extends('site.layout.site')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">School Classes</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                    eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            @if ($doctors)
                @foreach ($doctors as $doctor)
                    <div class="row g-4">

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
                                                    <small class="text-muted"><i
                                                            class="fas fa-stopwatch text-warning"></i>
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
            @endif
        </div>
    </div>
@endsection
