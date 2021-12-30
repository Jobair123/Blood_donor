<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation history</title>
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
    
   
    <h2>Last donate date: <b><i>{{$ur->l_donate}} </i></b></h2>
    


</body>
</html>