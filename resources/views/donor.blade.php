<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Donor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('user/style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('login.menu')
<br>
@if(Session::has('msg'))
<div class="alert alert-info">
  <strong>{{Session::get('msg')}}</strong> </a>.
</div>
@endif
   <div class="container">
    <form method = "POST" action="{{URL::to('/donor-list')}}">
   {{ csrf_field() }}
  <div class="form-group {{ $errors->has('loc') ? 'has-error' : ''}}">
    <label for="loc">Location</label>
    <input type="text" class="form-control" id="loc" name="loc"placeholder="Enter Location"value="{{old('loc')}}">
    {!! $errors->first('loc', '<p class="help-block">:message</p>') !!}
  </div>
  <label>Blood Group </label>  <br>
  <div class="form-group {{ $errors->has('bg') ? 'has-error' : ''}}">
<select class="form-control {{ $errors->has('bg') ? 'has-error' : ''}}"name="bg">  
<option value = ""selected> Select Blood Group  
</option>  
<option value = "A+"> A+
</option>  
<option value = "O+"> O+
</option>  
<option value = "B+"> B+
</option>  
<option value = "AB+"> AB+
</option> 
<option value = "A-"> A-
</option> 
<option value = "O-"> O-
</option> 
<option value = "B-"> B-
</option> 
<option value = "AB-"> AB-
</option> 
</select>
{!! $errors->first('bg', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('edate') ? 'has-error' : ''}}" >
    <label for="date">Date </label>
    <input type="date" class="form-control" id="edate" name="edate"placeholder="Enter Date"value="{{old('edate')}}">
    {!! $errors->first('edate', '<p class="help-block">:message</p>') !!}
  </div>
<div class="form-group {{ $errors->has('etime') ? 'has-error' : ''}}" >
    <label for="etime">Estimated Time Need </label>
    <input type="time" class="form-control" id="etime" name="etime"placeholder="Enter time"value="{{old('time')}}">
    {!! $errors->first('etime', '<p class="help-block">:message</p>') !!}
  </div>

     
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</body>
</html>