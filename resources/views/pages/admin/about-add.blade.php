@extends('layouts.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <form action="{{ route('about.store') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Add About</h5>
                    <div class="me-3">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="defaultFormControlInput" placeholder="Title of about"
                            aria-describedby="defaultFormControlHelp"/>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
