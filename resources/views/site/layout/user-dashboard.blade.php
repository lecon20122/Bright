@extends('site.layout.site')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('site.includes.side-bar')
            </div>
            <div class="col-md-9">
                @yield('sub-content')
            </div>
        </div>
        @include('includes.success-alert')
    </div>
@endsection
