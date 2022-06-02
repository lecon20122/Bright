@extends('site.layout.user-dashboard')
@section('sub-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card m-2" style="width: 18rem;">
                    <form method="POST" action="{{ route('schedule.store') }}">
                        @csrf
                        <div class="card-body">
                            <select class="form-select" name="reservation_day_id" aria-label="Default select example">
                                @foreach ($days as $day)
                                    <option value="{{ $day->id }}">{{ $day->day }}</option>
                                @endforeach
                            </select>
                            <div class="input-group m-1">
                                <span class="input-group">From</span>
                                <input type="time" name="from" class="form-control" aria-label="With textarea">
                            </div>
                            <div class="input-group m-1">
                                <span class="input-group">To</span>
                                <input type="time" name="to" class="form-control" aria-label="With textarea">
                            </div>
                        </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
@endsection
