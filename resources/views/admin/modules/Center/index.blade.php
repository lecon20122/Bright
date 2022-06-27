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
                    <th scope="col">Attach</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($centers as $center)
                    <tr>
                        <th>{{ $center->id }}</th>
                        <td>{{ $center->name }} </td>
                        <td>
                            @if ($center->is_approved)
                                <i class="fas fa-check text-success "></i>
                            @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('center.approve', ['center' => $center]) }}"
                                method="post">
                                @csrf
                                <button class="btn btn-{{ $center->is_approved ? 'danger' : 'success' }}"
                                    type="submit">{{ $center->is_approved ? 'Reject' : 'Approve' }}</button>
                            </form>
                        </td>
                        {{-- <td> <a href="{{route('categories.destroy' , ['id' => $category->id])}}"> {{ trans('DELETE') }}
                    </a> </td> --}}
                    <td>
                        <form action="{{ route('center.attach.view', ['center' => $center]) }}" method="GET">
                            @csrf
                            <button class="btn btn-primary" type="submit">Attach to Category</button>
                        </form>
                    </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
