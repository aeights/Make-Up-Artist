@extends('layouts.dashboard')

@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Services</h5>
                <div class="me-3">
                    <a class="btn btn-primary" href="{{ route('service.add') }}">Add</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($services as $item)  
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->id }}</strong></td>
                            <td>{{ $item->name }}</td>
                            <td>Rp. {{ $item->price }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{ route('service.edit') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="dropdown-item"><i class="bx bx-edit-alt me-1"></i>Edit</button>
                                            <a class="dropdown-item" href="{{ url('dashboard/service/delete/'.$item->id) }}"><i class="bx bx-trash me-1"></i>Delete</a>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
@endsection
