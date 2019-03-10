@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Orders') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">{{ __('Description') }}</div>
                        <div class="col-md-6">{{ $order->description }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('total price') }}</div>
                        <div class="col-md-6">{{ $order->total_price }}</div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <hr>
            <hr>

            
        </div>
    </div>
</div>
@endsection