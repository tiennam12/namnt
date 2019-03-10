@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
                <div class="card-header">User List</div>

                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">User_id</th>
                          <th scope="col">Total price</th>
                          <th scope="col">Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $order)
                            <tr class="row_{{ $order->id }}">
                              <th scope="row">{{ $order->id }}</th>
                              <td>{{ $order->user_id}}</td>
                              <td>{{ $order->total_price}}</td>
                              <td>{{ $order->description }}</td>
                              <td>
                                  <a href="orders/{{ $order->id }}/edit" class="btn btn-info" role="button">Edit</a>
                                  <a href="#" class="btn btn-info btn-del-order" role="button" data-order-id="{{ $order->id }}">Delete</a>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $('.btn-del-order').click(function() {
            if (confirm('You are sure?')) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var orderId = $(this).data('order-id');
                var url = '/orders/' + orderId;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(result) {
                        if (result.status) {
                            $('.row_' + orderId).remove();
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
