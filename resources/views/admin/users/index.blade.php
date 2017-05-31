@extends('layouts.admin')




@section('content')

   @if(session('delete'))
       <div class="alert alert-success">{{session()->pull('delete')}}</div>
   @endif
   @if(session('update'))
       <div class="alert alert-success">{{session()->pull('update')}}</div>
   @endif
   @if(session('create'))
       <div class="alert alert-success">{{session()->pull('create')}}</div>
   @endif

    <h1>Users</h1>
    <p>Section contains list of all registered users. You can view, edit or delete them.</p>
    <hr>

    @if($users)
    <table class="table table-striped">
        <thead>
          <tr>
            <th>#Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Delete user</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><a href="{{route('admin.users.edit', $user->id)}}"><img src="{{$user->photo ? $user->photo->file : '/images/nophoto.gif'}}" width="40px" height="40px" /></a></td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
              <td>{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</td>
            {!! Form::close() !!}
          </tr>
        @endforeach
        </tbody>
     </table>
     @else
         <p>No users for display</p>
    @endif



@stop