<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark rounded h-100">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('updateUser') }}" class="nav-link text-white" aria-current="page">
                Dashbaord
            </a>
        </li>
        <li>
            <a href="{{ route('reservations') }}" class="nav-link text-white">
                Reservations
            </a>
        </li>
        @if (auth()->user()->type != App\Enums\DataBaseEnum::PATIENT)
        <li>
            <a href="{{ route('schedule') }}" class="nav-link text-white">
                Schedule
            </a>
        </li>
        @endif
    </ul>
</div>
