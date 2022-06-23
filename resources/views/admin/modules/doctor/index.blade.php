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
                    <th scope="col">Sponsor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <th>{{ $doctor->id }}</th>
                        <td>{{ $doctor->name }} </td>
                        <td>
                            @if ($doctor->is_approved)
                                <i class="fas fa-check text-success "></i>
                            @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('doctor.approve', ['doctor' => $doctor]) }}" method="post">
                                @csrf
                                <button class="btn btn-{{ $doctor->is_approved ? 'danger' : 'success' }}"
                                    type="submit">{{ $doctor->is_approved ? 'Reject' : 'Approve' }}</button>
                            </form>
                        </td>
                        <td>
                            @if ($doctor->sponsor)
                                <i class="fas fa-check text-success "></i>
                            @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('doctor.sponsor', ['doctor' => $doctor]) }}" method="post">
                                @csrf
                                <button class="btn btn-{{ $doctor->sponsor ? 'danger' : 'success' }}"
                                    type="submit">{{ $doctor->sponsor ? 'Reject' : 'Approve' }}</button>
                            </form>
                        </td>
                        {{-- <td> <a href="{{route('categories.destroy' , ['id' => $category->id])}}"> {{ trans('DELETE') }}
                    </a> </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $doctors->links() }}
@endsection
