<!DOCTYPE html>
<html lang="en">
<head>
<title>Index</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ URL::asset('user/style.css') }}">
</head>
<body>

<div class="topnav">
  <a href="{{URL::to('/login')}}">Sign in</a>
  <a href="{{URL::to('/signup')}}">Sign up</a>
</div>

<div class="content">
  <h2><b>Digital Blood Management</b></h2>
  <p>Donate blood help others.</p>
  <a class="btn btn-danger" href="{{URL::to('/signup')}}">Sign up its Free!</a></div>

<div class="footer">
    <p>If you have already an account please sign in</p>
    <a class="btn btn-primary" href="{{URL::to('/login')}}">Sign in</a>
</div>

</body>
</html>