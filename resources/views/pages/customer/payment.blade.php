@extends('layouts.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <form action="{{ route('cust.payment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Add Payment</h5>
                    <div class="me-3">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" name="appointment_id" value="{{ $appointment_id }}">
                    <div class="mb-3">
                        <div>
                            <div class="bg-secondary rounded mb-3" style="width: 200px; height:200px;">
                                <img class="object-fit-cover w-100 h-100 rounded" id="img-preview" src="{{ asset('img/image-upload.jpg') }}"/>
                            </div>
                            <div class="input-group">
                                <input name="image" type="file" class="form-control" id="inputGroupFile02" onchange="readURL(this)"/>
                                <label class="input-group-text" for="inputGroupFile02">Evidence</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Type</label>
                        <input name="type" type="text" class="form-control" id="defaultFormControlInput"
                            placeholder="Account type" aria-describedby="defaultFormControlHelp" />
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="defaultFormControlInput"
                            placeholder="Name account" aria-describedby="defaultFormControlHelp" />
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Account Number</label>
                        <input name="account_number" type="text" class="form-control" id="defaultFormControlInput"
                            placeholder="Account number" aria-describedby="defaultFormControlHelp" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
