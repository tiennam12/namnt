<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
</head>
<body>
<div class="col-xs-8 col-xs-offset-2" style="margin-top:50px;">
    <form class="form-horizontal form-row-seperated" action="{{ URL::action('ProductsController@update') }}"
          method="Post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ old('id', $getProductById['id'])}}">
        <div class="form-group">
            <label for="exampleInputEmail1">category_id</label>
            <input type="text" class="form-control"
                   value="{{ old('category_id', $getProductById['category_id'])}}" name="category_id">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">product_name</label>
            <input type="text" class="form-control"
                   value="{{ old('category_name', $getProductById['category_name'])}}" name="category_name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">price</label>
            <input type="text" class="form-control"
                   value="{{ old('price', $getProductById['price'])}}" name="price">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">image</label>
            <input type="text" class="form-control"
                   value="{{ old('image', $getProductById['image'])}}" name="image">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">quantity</label>
            <input type="text" class="form-control"
                   value="{{ old('quantity', $getProductById['quantity'])}}" name="quantity">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">avg_rating</label>
            <input type="text" class="form-control"
                   value="{{ old('avg_rating', $getProductById['avg_rating'])}}" name="avg_rating">
        </div>
                

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
</body>
</html>