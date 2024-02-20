@extends("layouts.app")
@section("title","users")
@section("content")
<a href="{{route('users.create')}}" type="button" class="btn btn-primary">Add User</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->roles->name}}</td>
        <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-warning">edit</a></td>
        <td><a href="{{route('users.delete',$user->id)}}" class="btn btn-danger">delete</a></td>
    </tr>
@endforeach 

</tbody>
</table>
{{$users->links()}}
@endsection