@extends('layouts.main')

@section('content')
    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">{{ $about[0]->title }}</h2>
                    <p>{{ $about[0]->description }}</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('furni/images/truck.svg') }}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>{{ $about[1]->title }}</h3>
                                <p>{{ $about[1]->description }}</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('furni/images/bag.svg') }}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>{{ $about[2]->title }}</h3>
                                <p>{{ $about[2]->description }}</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('furni/images/support.svg') }}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>{{ $about[3]->title }}</h3>
                                <p>{{ $about[3]->description }}</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('furni/images/return.svg') }}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>{{ $about[4]->title }}</h3>
                                <p>{{ $about[4]->description }}</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ asset('furni/images/why-choose-us-img.jpg') }}" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->
@endsection
