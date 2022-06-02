@extends('site.layout.user-dashboard')
@section('sub-content')
    @if ($reservations)
        @if (auth()->user()->type == App\Enums\DataBaseEnum::PATIENT)
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
        @else
            <div class="container">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Time</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Controls</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <th>{{ $reservation->id }}</th>
                                <th>{{ App\Models\User::find($reservation->user_id)->name }}</th>
                                <td>{{ date('g:i A', strtotime($reservation->reservationTime->from)) }} </td>
                                <td>{{ $reservation->price }} </td>
                                <td>
                                    @if ($reservation->is_approved)
                                        <i class="fas fa-check text-success "></i>
                                    @else
                                        <i class="fas fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('reserve-approve', ['reservation' => $reservation]) }}"
                                        method="post">
                                        @csrf
                                        <button
                                            class="btn btn-sm btn-{{ $reservation->is_approved ? 'danger' : 'success' }}"
                                            type="submit">{{ $reservation->is_approved ? 'Reject' : 'Approve' }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total Sales</td>
                            <td><b>{{ $totalSales }} EGP</b> <small>(10% deduction every on overall sales)</small></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        @endif
    @endif
    {{ $reservations->links() }}
@endsection
