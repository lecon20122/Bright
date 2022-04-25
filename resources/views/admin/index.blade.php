@extends('admin.layout.admin-layout')
@section('content')
    <div>
        <br>
        <br>
        <p class="text"> WELCOME
            <br>
            {{ auth()->user()->name }}
        </p>
    </div>
@endsection
