@extends('admin.layout.admin-layout')
@section('content')
    <div class="container-fluid">
        @include('includes.success-alert')
        @include('includes.error-alert')
        @include('includes.create-button' , ['route' => route('question.create')])
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Controls</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($questions as $question)
                <tr>
                    <th>{{ $question->id }}</th>
                    <td>{{ $question->title }} </td>
                    <td><a href="{{ route('question.edit', ['question' => $question]) }}"> {{ trans('Edit') }}</a>
                        <a href="{{route('questions.destroy' , ['id'=>$question->id])}}"
                           class="mx-2 text-danger"> {{ trans('DELETE') }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $questions->links() }}
    </div>
@endsection
