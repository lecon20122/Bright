@extends('admin.layout.admin-layout')
@section('content')
    <div class="container-fluid">
        @include('includes.success-alert')
        @include('includes.error-alert')
        {{-- @include('includes.create-button' , ['route' => route('categories.create')]) --}}
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Controls</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shadowteachers as $shadowteacher)
                    <tr>
                        <th>{{ $shadowteacher->id }}</th>
                        <td>{{ $shadowteacher->name }} </td>
                        <td>
                            @if ($shadowteacher->is_approved)
                                <i class="fas fa-check text-success "></i>
                            @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('shadowteacher.approve', ['shadowteacher' => $shadowteacher]) }}" method="post">
                                @csrf
                                <button class="btn btn-{{ $shadowteacher->is_approved ? 'danger' : 'success' }}"
                                    type="submit">{{ $shadowteacher->is_approved ? 'Reject' : 'Approve' }}</button>
                            </form>
                        </td>
                        {{-- <td> <a href="{{route('categories.destroy' , ['id' => $category->id])}}"> {{ trans('DELETE') }}
                    </a> </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
