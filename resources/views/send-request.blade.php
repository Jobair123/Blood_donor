<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('user/style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('login.menu')
@if(Session::has('msg'))
<div class="alert alert-info">
  <strong>{{Session::get('msg')}}</strong> </a>.
</div>
@endif 
<br>
<div class="container">
    <form method = "POST" action="{{URL::to('/send-store/'.$dr->id)}}">
    {{ csrf_field() }}
    <h3>Donor Name: {{$dr->name}}</h3>
    <h3>Location: {{$dr->address}}</h3>
    <h3>Blood Group: {{$dr->bg}}</h3>
    <h3>Contact Number: {{$dr->contact}}</h3>
    <h3>He/she was last donate on:<b> {{$dr->l_donate}}<b></h3>
    <button type="submit" class="btn btn-success">Send Request</button>
</form>
</body>
</html>