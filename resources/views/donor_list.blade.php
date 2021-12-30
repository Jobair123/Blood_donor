<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Available</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('user/style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('login.menu')
    <div class="container">
    
   
    @if(Session::has('msg'))
<div class="alert alert-info">
  <strong>{{Session::get('msg')}}</strong> </a>.
</div>
@endif 
@if($donors->isEmpty())
        <div class="alert alert-info" role="alert">
  <h4 class="alert-heading">No data found!</h4>
  <p>There is no one allowed to donate blood!</p>
  <hr>
  <p class="mb-0">This was happen cause of one found in this location or not allowed to donate blood before 90 days!</p>
</div>
@endif

@if($donors)
<h3>Donors Available</h3>
        @foreach($donors as $e)   
    
    
    <table class="table table-striped">
        <thead>
        <th>Donor Name</th>
        <th>Blood Group</th>
        <th>Contact Number</th>
        <th>Location</th>
        <th>Last Donation Date</th>
    </thead>
    <tbody>
      
        <tr>
            
            <td>{{$e->name}}</td>
            <td>{{$e->bg}}</td>
            <td>{{$e->contact}}</td>
            <td>{{$e->address}}</td>
            <td>{{$e->l_donate}}</td>
            
            <td><a href="{{URL::to('/send-request/'.$e->id)}}" class="btn btn-danger btn-sm">Select</a>
           

      
  
        </td>
        </tr>
        </tbody>
    </table>
   
        @endforeach
 
        @endif
    
    </div>
</body>
</html>