@extends('admin.layout.admin-layout')
@section('content')
    <div class="container-fluid">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Parent</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->parent_id}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
