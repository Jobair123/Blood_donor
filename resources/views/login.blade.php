<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ URL::asset('user/style.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<body>

<div class="topnav">
  <a href="{{URL::to('/index')}}">Home</a>
  <a href="{{URL::to('/signup')}}">Sign up</a>
 
</div>
<div class="container">
<div class="login-form">
    <form action="{{URL::to('/login-store')}}" method="post">
        {{csrf_field()}}
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email"name="email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password"name="password" required="required">
        </div>
        @if(Session::has('err-msg'))
<div class="alert alert-info">
  <strong>{{Session::get('err-msg')}}</strong>.
</div>
@endif 
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
             
    </form>
    
</div>
</body>
</html>    