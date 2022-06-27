@extends('site.layout.user-dashboard')
@section('content')
    <div class="container text-center">
        @if ($content)
            @foreach ($content as $section => $description)
                <h1>{{ $section }}</h1>
                <p>{{ $description['content'] }}</p>
            @endforeach
        @endif
    </div>
@endsection
