@extends('layouts.dashboard')

@section('content')
    <div class="w-25 m-auto">
        <div class="card">
            <img class="card-img-top" src="{{ asset('sneat/assets/img/elements/2.jpg') }}" alt="Card image cap" />
            <div class="card-body">
                <h5 class="card-title">Oops</h5>
                <p class="card-text">
                    No appointments available, try add some!
                </p>
                <a href="{{ route('cust.appointment.add') }}" class="btn btn-outline-primary">Add Appointment</a>
            </div>
        </div>
    </div>
@endsection
