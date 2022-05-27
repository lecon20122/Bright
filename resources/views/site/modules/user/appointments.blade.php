@extends('site.layout.user-dashboard')
@section('sub-content')
    @if ($reservations)
        @foreach ($reservations as $reservation)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('images/users/') . '/' . $reservation->user->image }}" width="150px"
                            height="150px" alt="DOCTOR IMAGE" class=" rounded-start" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $reservation->user->name }} at
                                {{ date('g:i A', strtotime($reservation->from)) }} </h5>

                            @foreach ($reservation->user->categories as $category)
                                <p class="card-text">{{ $category->name }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
