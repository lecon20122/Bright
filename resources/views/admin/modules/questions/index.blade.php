@extends('admin.layout.admin-layout')
@section('content')
    <div class="container-fluid">
        @include('includes.success-alert')
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category_id</th>
                    <th scope="col">Controls</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $Question)
                <tr>
                    <th>{{ $Question->id }}</th>
                    <td>{{ $Question->name }} </td>
                    <td>{{ $Question->parent_id }}</td>
                    <td><a href="{{ route('question.edit', ['question' => $question]) }}"> {{ trans('Edit') }}
                        </a></td>
                    <td> <a href=""> {{ trans('DELETE') }}
                    </a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
