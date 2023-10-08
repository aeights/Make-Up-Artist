@extends('layouts.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <form action="{{ route('payment.store') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Add Payment</h5>
                    <div class="me-3">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </div>
                <div class="card-body">
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
