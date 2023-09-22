@extends('layouts.main')

@section('content')
    <div class="container-sm">
        <div class="card m-5 shadow">
            <div class="card-body p-5">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <input type="hidden" value="customer" name="role">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" id="name" class="form-control" type="text" placeholder="Name" aria-label="default input example">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input name="phone" id="phone" class="form-control" type="text" placeholder="08xxxxxxx" aria-label="default input example">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input name="address" id="address" class="form-control" type="text" placeholder="Jl. xxx xxx xxx" aria-label="default input example">
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
