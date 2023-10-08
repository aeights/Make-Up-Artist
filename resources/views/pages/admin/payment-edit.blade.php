@extends('layouts.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <form action="{{ route('payment.update') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Edit Payment</h5>
                    <div class="me-3">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="{{ $payment->id }}">
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Type</label>
                        <input name="type" value="{{ $payment->type }}" type="text" class="form-control" id="defaultFormControlInput"
                            placeholder="Account type" aria-describedby="defaultFormControlHelp" />
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input name="name" value="{{ $payment->name }}" type="text" class="form-control" id="defaultFormControlInput"
                            placeholder="Name account" aria-describedby="defaultFormControlHelp" />
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Account Number</label>
                        <input name="account_number" value="{{ $payment->account_number }}" type="text" class="form-control" id="defaultFormControlInput"
                            placeholder="Account number" aria-describedby="defaultFormControlHelp" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
