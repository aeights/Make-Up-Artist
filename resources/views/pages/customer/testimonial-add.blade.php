@extends('layouts.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <form action="{{ route('cust.store.testimonial') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Detail Appointment</h5>
                    <div class="me-3">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3 d-flex">
                        <div class="evidence-image me-3">
                            <label for="" class="form-label">Evidence</label>
                            <div class="preview-image">
                                <img src="{{ $payment->getFirstMediaUrl('evidence') }}">
                            </div>
                            <div id="image-viewer">
                                <span class="close">&times;</span>
                                <img class="modal-content" id="full-image">
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">Type</label>
                                <input readonly value="{{ $payment->type }}" name="type" type="text" class="form-control bg-white" id="defaultFormControlInput"
                                    placeholder="Type" aria-describedby="defaultFormControlHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">Name</label>
                                <input readonly value="{{ $payment->name }}" name="name" type="text" class="form-control bg-white" id="defaultFormControlInput"
                                    placeholder="Name" aria-describedby="defaultFormControlHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">Account Number</label>
                                <input readonly value="{{ $payment->account_number }}" name="account_number" type="text" class="form-control bg-white" id="defaultFormControlInput"
                                    placeholder="Account_number" aria-describedby="defaultFormControlHelp" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Status</label>
                        <select name="status" class="form-select" id="exampleFormControlSelect1"
                            aria-label="Default select example">
                            <option selected value="{{ $appointment->status }}">{{ $appointment->status }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Customer</label>
                        <select name="user_id" class="form-select" id="exampleFormControlSelect1"
                            aria-label="Default select example">
                            <option selected value="{{ $appointment->user_id }}">{{ $appointment->user['name'] }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Services</label>
                        <select name="service_id" class="form-select" id="exampleFormControlSelect1"
                            aria-label="Default select example">
                            <option selected value="{{ $appointment->service_id }}">{{ $appointment->service['name'] }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Date and Time</label>
                        <input readonly name="date" value="{{ $appointment->date }}" class="form-control bg-white"
                            type="datetime-local" id="html5-datetime-local-input" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Payment Method</label>
                        <select name="payment_method_id" class="form-select" id="exampleFormControlSelect1"
                            aria-label="Default select example">
                            <option selected value="{{ $appointment->payment_method_id }}">
                                {{ $appointment->paymentMethod['type'] }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Testimonial</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write your testimonial here"></textarea>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
