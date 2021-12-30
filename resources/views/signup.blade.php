<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('user/style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="topnav">

<a href="{{URL::to('/index')}}">Home</a>
  <a href="{{URL::to('/login')}}">Sign in</a>
 
  
</div>
<br>
   <div class="container">
    <form method = "POST" action="{{URL::to('/store')}}">
   {{ csrf_field() }}
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}" >
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name"placeholder="Enter Name"value="{{old('name')}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="Email">Email address</label>
    <input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Enter email"value="{{old('email')}}">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('password_confirm') ? 'has-error' : ''}}">
    <label for="Email1">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Re-Enter Password">
    {!! $errors->first('password_confirm', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('birthdate') ? 'has-error' : ''}}">
    <label for="Bithdate">Birthdate</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate"value="{{old('birthdate')}}">
    {!! $errors->first('birthdate', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('contact') ? 'has-error' : ''}}">
    <label for="Contact">Contact Number</label>
    <input type="number" class="form-control" id="contact" name="contact"value="{{old('contact')}}">
    {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
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
<div class="form-group {{ $errors->has('l_donate') ? 'has-error' : ''}}">
    <label for="l_donate">Last Donate Date (if have)</label>
    <input type="date" class="form-control" id="l_donate" name="l_donate"value="{{old('l_donate')}}">
    {!! $errors->first('l_donate', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('loc') ? 'has-error' : ''}}" >
    <label for="loc">Location</label>
    <input type="text" class="form-control" id="loc" name="loc"placeholder="Enter Location"value="{{old('loc')}}">
    {!! $errors->first('loc', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
  <b>Gender</b>
  {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
</div>
      <div class = "radio ">
         <label >
         
            <input type = "radio" name = "gender" id = "optionsRadios1" value = "male" > Male
         </label>
      </div>
      <div class = "radio">
         <label>
            <input type = "radio" name = "gender" id = "optionsRadios2" value = "female">
               Female
         </label>
      </div>
      <div class = "radio">
         <label>
            <input type = "radio" name = "gender" id = "optionsRadios2" value = "other">
               Other
         </label>
      </div>
      <div class="form-check">
  <label class="form-check-label" for="exampleCheck1">i want to donate blood</label>
    <input type="checkbox" name="active"value="1"class="form-check-input" id="exampleCheck1">
    
  </div>
      
     
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</body>
</html>