@extends('site.layout.site')
@section('content')
    <style>
        .paragraph {
            font-size: 25px
        }

        .center {
            text-emphasis-position:
        }
    </style>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">DOCTORS</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                    eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            @include('includes.success-alert')
            @include('includes.error-alert')
            @if ($CategoryUsers)
                @foreach ($CategoryUsers as $doctor)
                    <div class="row g-4">
                        <div class="card mb-3 mx-auto w-100" style="width: 952px;">
                            <div class="row">
                                <div class="col-md-4 p-0 m-0" style="height: 400px;">
                                    <img src="{{ asset('images/users/') . '/' . $doctor->image }}" width="400px"
                                        height="400px" alt="DOCTOR IMAGE" class=" rounded-start" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><small> {{ $doctor->type }} /</small>
                                            {{ $doctor->name }}</h5>
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <p class="card-text paragraph">
                                                    {{ $doctor->description }}
                                                </p>
                                                <p class="card-text">
                                                    <small class="text-muted">Last updated 3 mins ago</small>
                                                </p>
                                                <h4 class="text-success paragraph">
                                                    {{ $doctor->price }} EGP
                                                </h4>
                                                <h4 class="card-text paragraph">
                                                    <small class="text-muted"><i class="fas fa-stopwatch text-warning"></i>
                                                        {{ $doctor->wait_time }}</small>
                                                </h4>
                                                <p class="card-text paragraph ">
                                                    <small class="text-muted"><i
                                                            class="fas fa-map-marked-alt text-danger"></i>
                                                        {{ $doctor->address }}</small>
                                                </p>

                                            </div>
                                            @if ($doctor->reservationTimes)
                                                <div class="col-lg-6">
                                                    <label for="">Doctor Schedule</label>
                                                    <select class="form-control" name="category_id"
                                                        id="exampleFormControlSelect1">
                                                        @foreach ($doctor->reservationTimes as $appointiment)
                                                            <optgroup label="{{ $appointiment->reservationDay->day }}">
                                                                <option value="">from
                                                                    {{ date('g:i A', strtotime($appointiment->from)) }} to
                                                                    {{ date('g:i A', strtotime($appointiment->to)) }}
                                                                </option>
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                    @auth
                                                        <form method="POST"
                                                            action="{{ route('reserve-appointment', ['reservationTime' => $appointiment->id, 'user' => auth()->user(), 'doctor' => $doctor]) }}">
                                                            @csrf
                                                            <div class="d-grid gap-2">
                                                                <button type="submit" class="btn btn-primary"
                                                                    type="button">Resevre</button>
                                                            </div>
                                                            <br>
                                                            @auth
                                                                <a
                                                                    class="btn btn-primary" href="{{ route('feedback.index', ['user' => auth()->user()->id , 'doctor' => $doctor]) }}">See
                                                                    feedback OR Addfeedback

                                                                </a>
                                                            @endauth
                                                        </form>
                                                    @endauth
                                                </div>
                                            @endif
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
