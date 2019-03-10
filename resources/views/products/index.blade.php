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
                <div class="card-header">Products List</div>

                <div class="card-body">
                    <table class="table">
                      <!-- <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">category id</th>
                          <th scope="col">category name</th>
                          <th scope="col">price</th>
                          <th scope="col">image</th>
                          <th scope="col">quantity</th>
                          <th scope="col">avg rating</th>
                          <th scope="col">action</th>
                        </tr>
                      </thead> -->
                      <tbody>
                        <?php foreach($products as $product):  ?>
                        <!-- <tr>
                            <td> <?php echo $product['id']; ?> </td>
                            <td> <?php echo $product['category_id']; ?> </td>
                            <td> <?php echo $product['category_name']; ?> </td>
                            <td> <?php echo $product['price']; ?></td>
                            </td> <img src="{{ asset(config('products.image_path') . $product->image) }}" alt="{{ $product->image }}" height="70" width="70">
                            <td> <?php echo $product['quantity']; ?> </td>
                            <td> <?php echo $product['avg_rating']; ?> </td>
                        </tr> -->
                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); max-width: 500px; margin: auto; padding:7px; text-align: center; font-family: arial; float:left; margin-right: 10px;  margin-top: 10px;">
                            <img src="{{ asset(config('products.image_path') . $product->image) }}" alt="{{ $product->image }}"  height="70" width="70" >
                            <h1 class="price" style="color: grey; font-size: 22px;"> Price:<?php echo $product['price']; ?></h1>
                            <h1> Category name:<?php echo $product['category_name']; ?></h1>
                            <p> Quantity: <?php echo $product['quantity']; ?> </td>
                            <p> Avg Rating:<?php echo $product['avg_rating']; ?> </td>
                            <p style="float: right;">
                                <a href="/orders/create" class="btn btn-info" role="button">Buy</a>       
                                @if ( auth()->id() == $product->user_id )
                                    <a href="/products/<?php echo $product['id'];?>/edit" class="btn btn-info" role="button">Edit</a>
                                    <a href="#" class="btn btn-info btn-del-product" role="button" data-product-id="{{ $product->id }}">Delete</a>
                                @endif
                            </p>

                            
                        </div> 
                        <!-- <td>
                            <a href="/orders/create" class="btn btn-info" role="button">Buy</a>       
                            @if ( auth()->id() == $product->user_id )
                                <a href="/products/<?php echo $product['id'];?>/edit" class="btn btn-info" role="button">Edit</a>
                                <a href="#" class="btn btn-info btn-del-product" role="button" data-product-id="{{ $product->id }}">Delete</a>
                            @endif
                        </td> -->
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