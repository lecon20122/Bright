@extends('site.layout.user-dashboard')
@section('sub-content')
    @if ($reservationTimes)
        <div class="container">
            @include('includes.create-button' , ['route' => route('schedule.create')])
            <div class="row">
                @foreach ($reservationTimes as $reservationTime)
                    @csrf
                    <div class="col-lg-4">
                        <div class="card m-2" style="width: 18rem;">
                            <form action="{{ route('schedule.update') }}"
                                method="post">
                                <input type="hidden" name="id[]" value="{{ $reservationTime->id }}">
                                <div class="card-body">
                                    {{-- <label for="exampleFormControlInput1" class="form-label">Day</label> --}}
                                    <select class="form-select" name="reservation_day_id[]"
                                        aria-label="Default select example">
                                        @foreach ($days as $day)
                                            <option @selected($reservationTime->reservationDay->id == $day->id) value="{{ $day->id }}">
                                                {{ $day->day }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group m-1">
                                        <span class="input-group">From</span>
                                        <input type="time" name="from[]" value="{{ $reservationTime->from }}"
                                            class="form-control" aria-label="With textarea">
                                    </div>
                                    <div class="input-group m-1">
                                        <span class="input-group">To</span>
                                        <input type="time" name="to[]" value="{{ $reservationTime->to }}"
                                            class="form-control" aria-label="With textarea">
                                    </div>
                                </div>
                        </div>
                    </div>
                @endforeach
                <button type="submit[]" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    @endif
@endsection
