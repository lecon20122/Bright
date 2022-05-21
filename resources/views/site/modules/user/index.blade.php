@extends('site.layout.site')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="list-group" id="list-tab" role="tablist" id="myList">
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                        href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                    @if (auth()->user()->type != App\Enums\DataBaseEnum::PATIENT)
                        <a class="list-group-item list-group-item-action active" id="list-doctor-details-list"
                            data-toggle="list" href="#list-details" role="tab" aria-controls="details">Details</a>
                    @endif
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="nav-tabContent">
                    {{-- <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Your Profile</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form>
                                            <div class="form-group row">
                                                <label for="username" class="col-4 col-form-label">User Name*</label>
                                                <div class="col-8">
                                                    <input id="username" name="username" placeholder="Username"
                                                        class="form-control here" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-4 col-form-label">First Name</label>
                                                <div class="col-8">
                                                    <input id="name" name="name" placeholder="First Name"
                                                        class="form-control here" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lastname" class="col-4 col-form-label">Last Name</label>
                                                <div class="col-8">
                                                    <input id="lastname" name="lastname" placeholder="Last Name"
                                                        class="form-control here" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="text" class="col-4 col-form-label">Nick Name*</label>
                                                <div class="col-8">
                                                    <input id="text" name="text" placeholder="Nick Name"
                                                        class="form-control here" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="select" class="col-4 col-form-label">Display Name public
                                                    as</label>
                                                <div class="col-8">
                                                    <select id="select" name="select" class="custom-select">
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-4 col-form-label">Email*</label>
                                                <div class="col-8">
                                                    <input id="email" name="email" placeholder="Email"
                                                        class="form-control here" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="website" class="col-4 col-form-label">Website</label>
                                                <div class="col-8">
                                                    <input id="website" name="website" placeholder="website"
                                                        class="form-control here" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="publicinfo" class="col-4 col-form-label">Public Info</label>
                                                <div class="col-8">
                                                    <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newpass" class="col-4 col-form-label">New Password</label>
                                                <div class="col-8">
                                                    <input id="newpass" name="newpass" placeholder="New Password"
                                                        class="form-control here" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
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
                    </div> --}}
                    <div class="tab-pane fade show active" id="list-details" role="tabpanel"
                        aria-labelledby="list-doctor-details-list">
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
                                        <form method="POST"
                                            action="{{ route('postUpdateUser', ['user' => auth()->user()]) }}">
                                            @csrf
                                            <div class="form-group row my-2">
                                                <label for="username" class="col-4 col-form-label">Name</label>
                                                <div class="col-8">
                                                    <input id="username" value="{{ old('name', auth()->user()->name) }}"
                                                        name="name" placeholder="Username" class="form-control here"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="email" class="col-4 col-form-label">Email</label>
                                                <div class="col-8">
                                                    <input id="email" value="{{ old('email', auth()->user()->email) }}"
                                                        name="email" placeholder="Email" class="form-control here"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="email" class="col-4 col-form-label">Phone</label>
                                                <div class="col-8">
                                                    <input id="email" value="{{ old('phone', auth()->user()->phone) }}"
                                                        name="phone" placeholder="Email" class="form-control here"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="email" class="col-4 col-form-label">Description</label>
                                                <div class="col-8">
                                                    <input id="email"
                                                        value="{{ old('describtion', auth()->user()->description) }}"
                                                        name="description" placeholder="description"
                                                        class="form-control here" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="email" class="col-4 col-form-label">Price</label>
                                                <div class="col-8">
                                                    <input id="email" value="{{ old('price', auth()->user()->price) }}"
                                                        name="price" placeholder="price" class="form-control here"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="email" class="col-4 col-form-label">Wait time</label>
                                                <div class="col-8">
                                                    <input id="email"
                                                        value="{{ old('wait_time', auth()->user()->wait_time) }}"
                                                        name="wait_time" placeholder="wait time" class="form-control here"
                                                        type="text">
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
            </div>
        </div>
        @include('includes.success-alert')
    </div>
@section('scripts')
    <script>
        $('#myList a').on('click', function(event) {
            event.preventDefault()
            $(this).tab('show')
        })
    </script>
@endsection

@endsection
