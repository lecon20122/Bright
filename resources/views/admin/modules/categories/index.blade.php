@extends('admin.layout.admin-layout')
@section('content')
    <div class="container-fluid">
        @include('includes.success-alert')
        @include('includes.error-alert')
        @include('includes.create-button' , ['route' => route('categories.create')])
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Parent</th>
                <th scope="col">Controls</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->name }} </td>
                    <td>{{ $category->parent_id }}</td>
                    <td><a href="{{ route('categories.edit', ['category' => $category]) }}"> {{ trans('Edit') }}
                        </a></td>
                    <td> <a href="{{route('categories.destroy' , ['id' => $category->id])}}"> {{ trans('DELETE') }}
                    </a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{  $categories->links() }}
    </div>
@endsection
