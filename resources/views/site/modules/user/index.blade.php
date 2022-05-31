@extends('site.layout.user-dashboard')
@section('sub-content')
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-details" role="tabpanel" aria-labelledby="list-doctor-details-list">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Your Dashboard</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('postUpdateUser', ['user' => auth()->user()]) }}">
                                @csrf
                                <div class="form-group row my-2">
                                    <label for="username" class="col-4 col-form-label">Name</label>
                                    <div class="col-8">
                                        <input id="username" value="{{ old('name', auth()->user()->name) }}" name="name"
                                            placeholder="Username" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input id="email" value="{{ old('email', auth()->user()->email) }}" name="email"
                                            placeholder="Email" class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label for="email" class="col-4 col-form-label">Phone</label>
                                    <div class="col-8">
                                        <input id="email" value="{{ old('phone', auth()->user()->phone) }}" name="phone"
                                            placeholder="Email" class="form-control here" type="text">
                                    </div>
                                </div>
                                @if ($user->type !== App\Enums\DataBaseEnum::Patient)
                                    <div class="form-group row my-2">
                                        <label for="email" class="col-4 col-form-label">Description</label>
                                        <div class="col-8">
                                            <input id="email"
                                                value="{{ old('describtion', auth()->user()->description) }}"
                                                name="description" placeholder="description" class="form-control here"
                                                type="text">
                                        </div>
                                @endif
                        </div>
                        <div class="form-group row my-2">
                            <label for="email" class="col-4 col-form-label">Price</label>
                            <div class="col-8">
                                <input id="email" value="{{ old('price', auth()->user()->price) }}" name="price"
                                    placeholder="price" class="form-control here" type="text">
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label for="email" class="col-4 col-form-label">Wait time</label>
                            <div class="col-8">
                                <input id="email" value="{{ old('wait_time', auth()->user()->wait_time) }}"
                                    name="wait_time" placeholder="wait time" class="form-control here" type="text">
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn btn-primary">Update My
                                    Profile</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
