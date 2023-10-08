@extends('layouts.main')

@section('content')
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                @foreach ($services as $item)  
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="#">
                        <h3 class="product-title">{{ $item->name }}</h3>
                        <p>{{ $item->description }}</p>
                        <strong class="product-price">Rp. {{ $item->price }}</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid">
                        </span>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
