@extends('layouts.welcome')

@section('content')

<div class="">
    <div class="row justify-content-start">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header font-color h4">{{ __('categories') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update',$categories->id) }}">
                        @csrf

                        <div class="row mb-3 font-color2">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6 font-color2">
                                <input id="name" type="text"class="form-control item"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-5">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>








@endsection
