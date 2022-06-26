@extends('site.layout.basic')
<title>Bright</title>
@section('content')
    <style>
        .font-color {
            color: #3b5ec6;
            font-weight: bolder;
            text-align: center;

        }

        .font-color2 {
            color: #3b5ec6;
            font-weight: bolder;
        }

    </style>
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 mx-auto mt-5">
            <div class="card">
                <div class="card-header font-color h4">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                        accept="image/jpg/jpeg">
                        @csrf

                        <div class="row mb-3 font-color2">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6 font-color2">
                                <input id="name" type="text" class="form-control item"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 font-color2">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6 font-color2">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 font-color2">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6 font-color2">
                                <input id="address" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3 font-color2">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6 font-color2">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 font-color2">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6 font-color2">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 font-color2">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6 font-color2">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- select department for doctors only --}}
                        <div class="row mb-3 font-color2" style="display: none" id="department">
                            <label class="col-md-4 col-form-label text-md-end" for="exampleFormControlSelect1">Select
                                Department  </label>
                            <div class="col-md-6 font-color2">
                                <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                    @foreach ($categories as $category)
                                        @if (count($category->children))
                                            @include('admin.modules.categories.sub-categories', [
                                                'subcategories' => $category->children,
                                            ])
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        {{-- toggable --}}
                        <div class="row mb-3 font-color2">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6 font-color2">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" autocomplete="new-image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3 ">
                            <label for="type"
                                class="col-md-4 col-form-label text-md-end font-color2">{{ __('Choose User Type') }}</label>
                            <div class="col-md-6 font-color2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="doctor"
                                        value="{{ \App\Enums\DataBaseEnum::DOCTOR }}">
                                    <label class="form-check-label" for="doctor">
                                        Doctor
                                    </label>
                                </div>
                                <div class="form-check font-color2 ">
                                    <input class="form-check-input" type="radio" name="type" id="shadow-teacher"
                                        value="{{ \App\Enums\DataBaseEnum::SHADOW_TEACHER }}">
                                    <label class="form-check-label" for="exampleRadios1">
                                        SHADOW TEACHER
                                    </label>
                                </div>
                                <div class="form-check font-color2 ">
                                    <input class="form-check-input" type="radio" name="type" id="shadow-teacher"
                                        value="{{ \App\Enums\DataBaseEnum::CENTER }}">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Center
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 background-image-register">
        </div>
    </div>

@section('page-js-script')
    <script>
        $(document).ready(function() {

            $('input[type="radio"]').click(function() {
                if ($(this).attr("id") == "doctor") {
                    $("#department").show();
                }
                if ($(this).attr("id") == "shadow-teacher") {
                    $("#department").hide();
                }
            });

            $('input[type="radio"]').trigger('click'); // trigger the event
        });
    </script>
@endsection
@endsection
