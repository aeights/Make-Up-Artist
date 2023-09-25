@extends('layouts.dashboard')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <form action="{{ route('service.store') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Add Service</h5>
                    <div class="me-3">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="defaultFormControlInput"
                            placeholder="Name of service" aria-describedby="defaultFormControlHelp" />
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp.</span>
                            <input name="price" type="number" min="0" class="form-control"
                                placeholder="Service price" id="price">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" placeholder="Service description" rows="3"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
