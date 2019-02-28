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
    <form class="form-horizontal form-row-seperated" action="{{ URL::action('OrdersController@store') }}"
    method="Post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="exampleInputEmail1">total_price</label>
            <input type="text" class="form-control" placeholder="total_price" name="total_price">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">user_id</label>
            <input type="text" class="form-control" placeholder="user_id" name="user_id">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">description</label>
            <input type="text" class="form-control" placeholder="description" name="description">
        </div>
        
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
</body>
</html>