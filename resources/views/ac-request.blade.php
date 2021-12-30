<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('user/style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('login.menu')
@if(Session::has('msg'))
<div class="alert alert-success">
  <strong>{{Session::get('msg')}}</strong> </a>.
</div>
@endif 
<br>
<div class="container">
    <form method = "POST" action="{{URL::to('/ac-store/'.$dr->did)}}">
    {{ csrf_field() }}
    <h3>Location: {{$dr->loc}}</h3>
    <h3>Contact: {{$dr->p_contact}}</h3>
    <h3>Gender: {{$dr->p_gender}}</h3>
    <h3>Estimate Date and time: {{$dr->edate}} {{$dr->etime}}</h3>
    
    <button type="submit" class="btn btn-success">Accept Request</button>
</form>
</body>
</html>