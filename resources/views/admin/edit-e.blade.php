<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('user/style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('admin.menu')
<div class="container">
    
    @if(Session::has('msg'))
<div class="alert alert-info">
  <strong>{{Session::get('msg')}}</strong> </a>.
</div>
@endif
    <h3>Edit User</h3>
    <form method = "POST" action="{{URL::to('admin/update-e/'.$emp->id)}}">
   {{ csrf_field() }}
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name"value="{{$emp->name}}">
  </div>
  <div class="form-group">
    <label for="contact">Contact</label>
    <input type="number" class="form-control" id="contact" name="contact"value="{{$emp->contact}}">
  </div>
  <div class="form-group">
    <label for="Email">Email address</label>
    <input type="email" class="form-control" id="Email" name="email"value="{{$emp->email}}">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
 
  
  <label>Blood Group </label>  <br>
<select class="form-control"name="bg">  
<option value = ""{{ ($emp->bg == '') ?  "selected" : '' }}> Select Blood Group
</option> 
<option value = "A+"{{ ($emp->bg == 'A+') ?  "selected" : '' }}> A+ 
</option>  
<option value = "O+"{{ ($emp->bg == 'O+') ?  "selected" : '' }}> O+
</option>  
<option value = "B+"{{ ($emp->bg == 'B+') ?  "selected" : '' }}> B+
</option>  
<option value = "AB+"{{ ($emp->bg == 'AB+') ?  "selected" : '' }}> AB+
</option>  
<option value = "A-"{{ ($emp->bg == 'A-') ?  "selected" : '' }}> A-
</option>  
<option value = "O-"{{ ($emp->bg == 'O-') ?  "selected" : '' }}> O-
</option>  
<option value = "B-"{{ ($emp->bg == 'B-') ?  "selected" : '' }}> B-
</option>  
<option value = "AB-"{{ ($emp->bg == 'AB-') ?  "selected" : '' }}> AB-
</option>  
</select>
<label for = "name">Gender</label>
      <div class = "radio">
         <label>
            <input type = "radio" name = "gender" id = "optionsRadios1" value = "male" {{ ($emp->gender == 'male') ?  "checked" : '' }}> Male
         </label>
      </div>
      <div class = "radio">
         <label>
            <input type = "radio" name = "gender" id = "optionsRadios2" value = "female"{{ ($emp->gender == 'female') ?  "checked" : '' }}>
               Female
         </label>
      </div>
      <div class = "radio">
         <label>
            <input type = "radio" name = "gender" id = "optionsRadios2" value = "other">
               Other
         </label>
      </div>
<div class="form-group">
    <label for="Bithdate">Birthdate</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate"value="{{$emp->birthdate}}">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="address" class="form-control" id="address" name="address"value="{{$emp->address}}">
  </div>
  <div class="form-group">
    <label for="l_donate">Last Donate Date </label>
    <input type="date" class="form-control" id="l_donate" name="l_donate"value="{{$emp->l_donate}}">
  </div>
  <div class="form-check">
  <label class="form-check-label" for="exampleCheck1">Active</label>
    <input type="checkbox" name="active"value="1"class="form-check-input" id="exampleCheck1"{{ ($emp->active == '1') ?  "checked" : '' }}>
    
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
</body>
</html>