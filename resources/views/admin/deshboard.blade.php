<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All</title>
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
    <h3>All Users</h3>
    
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Password</th>
        <th>Blood Group</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Address</th>
        <th>Last Donate Date</th>
        <th>Active</th>
        <th>Action</th>
    </thead>
    <tbody>
        @if($cm)
        @foreach($cm as $e)
        <tr>
            <td>{{$e->id}}</td>
            <td>{{$e->name}}</td>
            <td>{{$e->contact}}</td>
            <td>{{$e->email}}</td>
            <td>{{$e->password}}</td>
            <td>{{$e->bg}}</td>
            <td>{{$e->gender}}</td>
            <td>{{$e->birthdate}}</td>
            <td>{{$e->address}}</td>
            <td>{{$e->l_donate}}</td>
            @if($e->active==true)
            <td>Yes</td>
            @else
            <td>No</td>
            @endif
            <td><a href="{{URL::to('admin/edit/'.$e->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{$e->id}}">Delete</a>
              <!-- Modal -->
  <div class="modal fade" id="myModal{{$e->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Delete</strong></h4>
        </div>
        <div class="modal-body">
          <p>Are you sure to delete <b>{{$e->name}}</b>?</p>
        </div>
        <div class="modal-footer">
            <a href="{{URL::to('admin/delete/'.$e->id)}}"class="btn btn-primary">Delete</a>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        </td>
        </tr>
        @endforeach
        @else
        <tr >
            <td colspan="7"class="text-center">No Data!</td>
        </tr>
        @endif
    </tbody>
    </table>
    </div>
</body>
</html>