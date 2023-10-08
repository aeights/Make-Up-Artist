@extends('layouts.dashboard')

@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Payments</h5>
                <div class="me-3">
                    <a class="btn btn-primary" href="{{ route('payment.add') }}">Add</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Account Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($payments as $item)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $item->id }}</strong>
                                </td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->account_number }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ url('dashboard/payment/edit/'.$item->id) }}" class="dropdown-item"><i
                                                    class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a href="{{ url('dashboard/payment/delete/'.$item->id) }}" class="dropdown-item"><i
                                                    class="bx bx-trash me-1"></i>Delete</a>
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
