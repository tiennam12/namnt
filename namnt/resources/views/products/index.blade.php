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
                          <th scope="col">category id</th>
                          <th scope="col">category name</th>
                          <th scope="col">price</th>
                          <th scope="col">quantity</th>
                          <th scope="col">avg rating</th>
                          <th scope="col">action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($products as $product):  ?>
                        <tr>
                            <td> <?php echo $product['id']; ?> </td>
                            <td> <?php echo $product['category_id']; ?> </td>
                            <td> <?php echo $product['category_name']; ?> </td>
                            <td> <?php echo $product['price']; ?></td>
                            <td> <?php echo $product['image']; ?> </td>
                            <td> <?php echo $product['quantity']; ?> </td>
                            <td> <?php echo $product['avg_rating']; ?> </td>
                        </tr>
                        <td>
                                  <a href="products/<?php echo $product['id'];?>/edit" class="btn btn-info" role="button">Edit</a>
                                  <a href="#" class="btn btn-info btn-del-product" role="button" data-product-id="{{ $product->id }}">Delete</a>
                        </td>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $('.btn-del-product').click(function() {
            if (confirm('You are sure?')) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var productId = $(this).data('product-id');
                var url = '/products/' + productId;

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(result) {
                        if (result.status) {
                            $('.row_' + productId).remove();
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