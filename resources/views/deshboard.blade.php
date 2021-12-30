<!DOCTYPE html>
<html lang="en">
<head>
<title>Deshboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{ URL::asset('user/style.css') }}">
@include('login.menu')
</head>
<body>


<div class="content">
  <h2>Deshboard</h2>
  <p>Donate blood help others.</p>
  <a href="{{URL::to('/donor')}}" class="btn btn-danger btn-sm">Search Blood For Free!</a>
</div>
 
    
  <div class="container">
    @if(Session::has('msg'))
<div class="alert alert-info">
  <strong>{{Session::get('msg')}}</strong> </a>.
</div>
@endif 
@if( $dr->isEmpty())
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Good Job!</h4>
  <p>You have no pending Request!</p>
  <hr>
  <p class="mb-0">Whenever someone ask to donate blood we will notify you. You can also search donor for other patient within this site. Have a nice day!</p>
</div>
@endif
          @if($dr)
          <h4>Pending Request:</h4>
        @foreach($dr as $e)

    
    <table class="table table-striped">
        <thead>
        
        <th>Blood Group</th>
        <th>Contact Number</th>
        <th>Location</th>
        <th>Gender</th>
        <th>Estimated Date & time</th>
    </thead>
    <tbody>
       
        <tr>
       
           
            <td>{{$e->bg}}</td>
            <td>{{$e->p_contact}}</td>
            <td>{{$e->loc}}</td>
            <td>{{$e->p_gender}}</td>
            <td>{{$e->etime}} {{$e->edate}}</td>
            
            <td><a href="{{URL::to('/ac-request/'.$e->id)}}" class="btn btn-danger btn-sm">Select</a>
         </td> 
          </tr>
</tbody>
      
        @endforeach
        @else

        
        @endif
</div>

        

</body>
</html>