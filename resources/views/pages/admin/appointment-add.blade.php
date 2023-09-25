@extends('layouts.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Vertically Centered Modal -->
        <div class="col-lg-4 col-md-6">
            <div class="mt-3">
                <!-- Button trigger modal -->
                <button type="button" id="buttonSchedule" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSchedule">
                    Launch modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalSchedule" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameWithTitle" class="form-label">Name</label>
                                        <input type="text" id="nameWithTitle" class="form-control"
                                            placeholder="Enter Name" />
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="emailWithTitle" class="form-label">Email</label>
                                        <input type="text" id="emailWithTitle" class="form-control"
                                            placeholder="xxxx@xxx.xx" />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="dobWithTitle" class="form-label">DOB</label>
                                        <input type="text" id="dobWithTitle" class="form-control"
                                            placeholder="DD / MM / YY" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <form action="{{ route('appointment.add') }}" method="POST">
                @csrf
                {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Add Appointment</h5>
                    <div class="me-3">
                        <a onclick="document.getElementById('buttonSchedule').click()" class="btn btn-primary text-white me-1" type="submit">Available Schedule</a>
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Customer</label>
                        <select name="user_id" class="form-select" id="exampleFormControlSelect1"
                            aria-label="Default select example">
                            <option selected hidden>Select customer</option>
                            @foreach ($customer as $item)
                                <option value="{{ $item->id }}">Name: {{ $item->name }} | Email: {{ $item->email }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Services</label>
                        <select name="service_id" class="form-select" id="exampleFormControlSelect1"
                            aria-label="Default select example">
                            <option selected hidden>Select service</option>
                            @foreach ($services as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Date and Time</label>
                        <input name="date" class="form-control" type="datetime-local" id="html5-datetime-local-input" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
