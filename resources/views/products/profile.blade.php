@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Product profile') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">{{ __('Category') }}</div>
                        <div class="col-md-6">{{ $product->category_id }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Product name') }}</div>
                        <div class="col-md-6">{{ $product->product_name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Price') }}</div>
                        <div class="col-md-6">{{ $product->price }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Image') }}</div>
                        <div class="col-md-6">
                        <img src="{{ asset(config('products.image_path') . $product->image) }}" alt="{{ $product->image }}" height="70" width="70">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Quantity') }}</div>
                        <div class="col-md-6">{{ $product->quantity }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('Rating') }}</div>
                        <div class="col-md-6">{{ $product->avg_rating }}</div>
                    </div>
                </div>
            </div>

            <br>
            <a href="{{ route('products.create') }}" class="btn btn-info" role="button">Create product</a>
        </div>
    </div>
</div>
@endsection