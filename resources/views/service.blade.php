@extends('layouts.main')

@section('content')
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < 10; $i++)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <h3 class="product-title">Nordic Chair</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima voluptatum excepturi autem earum? Ex atque ea quo temporibus, vel repudiandae!</p>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                @endfor

            </div>
        </div>
    </div>
@endsection
