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
                        <?php foreach($order->products as $product):  ?>
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
                                  <a href="products/<?php echo $product['id'];?>/delete" class="btn btn-info" role="button"> Delete</a>
                        </td>
                      <?php endforeach; ?>
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection