@extends('layouts.home')

@section('content')
<style>
    .font-color {
        color: #3b5ec6;
        font-weight: bolder;
       text-align: center;

    }
    .font-color2{
        color: #3b5ec6;
        font-weight: bolder;
    }

</style>
<div class="container font-color">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('THANK YOU') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
