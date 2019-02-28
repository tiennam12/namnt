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
    <form class="form-horizontal form-row-seperated" action="{{ URL::action('UsersController@store') }}"
    method="Post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="exampleInputEmail1">UserName</label>
            <input type="text" class="form-control" placeholder="name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">email</label>
            <input type="text" class="form-control" placeholder="email" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">password</label>
            <input type="text" class="form-control" placeholder="password" name="password">
        </div>
       

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
</body>
</html>