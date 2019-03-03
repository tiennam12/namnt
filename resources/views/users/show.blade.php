@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User profile') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">{{ __('Name') }}</div>
                        <div class="col-md-6">{{ $user->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">{{ __('E-Mail Address') }}</div>
                        <div class="col-md-6">{{ $user->email }}</div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <hr>
            <h2>{{ $user->name . __("'s orders" ) }}</h2>
            <hr>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">status</th>
                  <th scope="col">Description</th>
                  <th scope="col">Total price</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($user->orders as $order)
                        <tr class="row_{{ $user->id }}">
                            <th scope="row">
                                <a href="/users/{{ $user->id }}">{{ $order->id }}</a>
                            </th>
                            <td>
                                <a href="/users/{{ $user->id }}">{{ $order->status }}</a>
                            </td>
                            <td>
                                <a href="/users/{{ $user->id }}">{{ $order->description }}</a>
                            </td>
                            <td>{{ $order->total_price }}</td>
                            <td>
                                <a href="users/{{ $user->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                <a href="#" class="btn btn-info btn-del-user" role="button" data-user-id="{{ $user->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
            <a href="{{ route('orders.create') }}" class="btn btn-info" role="button">Create order</a>
        </div>
    </div>
</div>
@endsection