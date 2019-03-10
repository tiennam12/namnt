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
                        <tr class="row_{{ $order->id }}">
                            <th scope="row">
                                <a href="/orders/{{ $user->id }}">{{ $order->id }}</a>
                            </th>
                             <td>
                                @switch($order->status)
                                    @case(config('orders.cancelled'))
                                        <span class="status badge badge-danger">{{ __('order.status.' . $order->status) }}</span>
                                        @break

                                    @case(config('orders.delivering'))
                                        <span class="status badge badge-warning">{{ __('order.status.' . $order->status) }}</span>
                                        @break

                                    @default
                                        <span class="status badge badge-primary">{{ __('order.status.' . $order->status) }}</span>
                                @endswitch
                            </td>
                            <td>
                                <a href="/users/{{ $user->id }}">{{ $order->description }}</a>
                            </td>
                            <td>{{ $order->total_price }}</td>
                            <td>
                                <a href="users/{{ $user->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                <a href="#" class="btn btn-info btn-del-user" role="button" data-user-id="{{ $user->id }}">Delete</a>
                                @if ($order->status != config('orders.cancelled'))
                                    <div class="btn btn-info btn-cancelled-order" data-order-id="{{ $order->id }}">Cancelled</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
            <a href="{{ route('orders.create') }}" class="btn btn-info" role="button">Create order</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-cancelled-order').click(function() {
            if (confirm('You are sure?')) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var orderId = $(this).data('order-id');
                var url = '/orders/cancelled/' + orderId;
                var cancelBtn = $(this);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data : {
                        status : 3,
                    },
                    success: function(result) {
                        if (result.status) {
                            var elementStatus = $('.row_' + orderId).find('.status');
                            elementStatus.text('Cancelled');
                            elementStatus.removeClass('badge-warning');
                            elementStatus.removeClass('badge-primary');
                            elementStatus.addClass('badge-danger');
                            cancelBtn.remove();
                        } else {
                            alert(result.msg);
                        }
                    },
                    error: function() {
                        location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection