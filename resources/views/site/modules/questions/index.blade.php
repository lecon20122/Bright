@extends('site.layout.site')
@section('content')
    <div class="container py-4">
        @if ($category)
            @foreach ($category->questions as $question)
                <form class="w-75 mx-auto"
                    action="{{ route('store-test-question', ['question' => $question, 'category' => $category]) }}">
                    @csrf
                    <div class="mb-3">
                        <h3 class="text-primary d-inline-block">Q. </h3>
                        <h4 class="d-inline-block">{{ $question->title }}</h4>
                    </div>
                    <select name="answers[{{ $question->title }}]" class="form-select w-25 my-3" aria-label="Default select example">
                        <option value="1">yes</option>
                        <option value="0">no</option>
                    </select>
            @endforeach
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
        @endif
    </div>
    @include('includes.success-alert')
@endsection
