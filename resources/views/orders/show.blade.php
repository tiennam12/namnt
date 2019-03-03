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

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">category_id</th>
                  <th scope="col">category_name</th>
                  <th scope="col">price</th>
                  <th scope="col">quantity</th>
                  <th scope="col">avg_rating</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($order->products as $product)
                        <tr class="row_{{ $order->id }}">
                            <th scope="row">
                                <a href="/orders/{{ $order->id }}">{{ $product->id }}</a>
                            </th>
                            <td>
                                <a href="/orders/{{ $order->id }}">{{ $product->category_id }}</a>
                            </td>
                            <td>
                                <a href="/orders/{{ $order->id }}">{{ $product->category_name }}</a>
                            </td>
                            <td>
                                <a href="/orders/{{ $order->id }}">{{ $product->price }}</a>
                            </td>
                            <td>
                                <a href="/orders/{{ $order->id }}">{{ $product->quantity }}</a>
                            </td>
                            <td>
                                <a href="/orders/{{ $order->id }}">{{ $product->avg_rating }}</a>
                            </td>
                            <td>{{ $order->total_price }}</td>
                            <td>
                                <a href="orders/{{ $user->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                <a href="#" class="btn btn-info btn-del-order" role="button" data-user-id="{{ $order->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection