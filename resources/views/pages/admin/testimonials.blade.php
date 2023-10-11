@extends('layouts.dashboard')

@section('content')
    <!-- Basic Bootstrap Table -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Testimonials</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Description</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($testimonials as $no => $item)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $no + 1 }}</strong></td>
                                <td>{{ $item->service_name }}</td>
                                <td>{{ $item->service_price }}</td>
                                <td>{{ $item->appointment_date }}</td>
                                <td>{{ substr($item->description,0,50) }}...</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('cust.edit.testimonial') }}" method="GET">
                                                @csrf
                                                <input type="hidden" name="testimonial_id" value="{{ $item->id }}">
                                                <input type="hidden" name="appointment_id" value="{{ $item->appointment_id }}">
                                                <input type="hidden" name="payment_method_id" value="{{ $item->payment_method_id }}">
                                                {{-- <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-edit-alt me-1"></i>Edit</button> --}}
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
