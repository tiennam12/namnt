@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <form class="form-inline" action="/search ">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" name="search" placeholder="Search product name" id="search" class="float-right">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
                <div class="row">
                <div class="col-md-9 float-right">Order by:</div>
                <div class="col-md-3">
                    <select class="form-control" id="order">
                        <option value="1" {{ $selected[1] ? 'selected' : '' }}>Created at</option>
                        <option value="2" {{ $selected[2] ? 'selected' : '' }}>Price increase</option>
                        <option value="3" {{ $selected[3] ? 'selected' : '' }}>Price decrease</option>
                    </select>
                </div>
                </div>
            </form>
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
                <div class="card-header">Products List</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                        <?php foreach($products as $product):  ?>
                        <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); max-width: 500px; margin: auto; padding:7px; text-align: center; font-family: arial; float:left; margin-right: 10px;  margin-top: 10px;">
                            <img src="{{ asset(config('products.image_path') . $product->image) }}" alt="{{ $product->image }}"  height="70" width="70" >
                            <h1 class="price" style="color: grey; font-size: 22px;"> Price:<?php echo $product['price']; ?></h1>
                            <h1> Product name:<?php echo $product['product_name']; ?></h1>
                            <p> Quantity: <?php echo $product['quantity']; ?> </td>
                            <p> Avg Rating:<?php echo $product['avg_rating']; ?> </td>
                            <form method="POST" action="{{ route('orders.store') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input id="total_price" type="hidden"  name="total_price" value="{{ $product->price }}">
                                <input id="description" type="hidden"  name="description" value="{{ $product->product_name }}">
                                <button type="submit" class="btn btn-primary"> Buy </button>
                            </form>
                            <p style="float: right;">
                                @if ( auth()->id() == $product->user_id )
                                    <a href="/products/<?php echo $product['id'];?>/edit" class="btn btn-info" role="button">Edit</a>
                                    <a href="#" class="btn btn-info btn-del-product" role="button" data-product-id="{{ $product->id }}">Delete</a>
                                @endif
                            </p>

                        </div>

                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js">
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
        $('#search').keyup(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var keyWord = $(this).val();
            var url = '/products/search/' + keyWord;
            $.ajax({
                url: url,
                type: 'GET',
                success: function(result) {
                    displayProduct(result);
                },
                error: function() {
                    location.reload();
                }
            });
        });
        function displayProduct(products) {
            $('#product-list').html('');
            $.each(products, function(index, product) {
                var row = '<tr class="row_' + product.id + '">'
                        +  '<th scope="row">' + product.id + '</th>'
                        +  '<td>'
                                + '<a href="#">' + product.product_name + '</a>'
                            + '</td>'
                        +  '<td>' + product.price + '</td>'
                        +  '<td>'
                            + '<a href="#" class="btn btn-info" role="button">Edit</a>'
                            + '<a href="#" class="btn btn-info btn-del-product" role="button" data-product-id="' + product.id + '>Delete</a>'
                        +  '</td>'
                    + '</tr>';
                $('#product-list').append(row);
            });
        }
        $('#order').change(function() {
            var selectValue = $(this).val();
            var redirectUrl = 'http://localhost:8000/?orderBy=created_at&type=desc';
            if (selectValue == 2) {
                redirectUrl = 'http://localhost:8000/?orderBy=price&type=asc';
            } else if (selectValue == 3) {
                redirectUrl = 'http://localhost:8000/?orderBy=price&type=desc';
            }
            window.location.replace(redirectUrl);
        });
    });
</script>
@endsection