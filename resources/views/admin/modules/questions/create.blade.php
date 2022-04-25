@extends('admin.layout.admin-layout')

@section('content')
    <div>
        <div class="row justify-content-start">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header font-color h4">{{ __(' Add Question') }}</div>
                    <div class="card-body">
                        <form method="POST" class="" action="{{ route('question.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">category_id</label>
                                <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                    @foreach($questions as $Question)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Question</label>
                                <input type="name" class="form-control" name="name" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
        @include('includes.success-alert')
            </div>
        </div>
    </div>
@endsection
