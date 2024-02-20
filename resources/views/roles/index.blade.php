@extends("layouts.app")
@section("title","role")
@section("content")
<a href="{{route('roles.create')}}" type="button" class="btn btn-primary">Add Role</a>
<table class="table" id="amin">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($roles as $role)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>

      <td>{{$role->name}}</td>

      <td><a href="{{route('roles.edit',$role->id)}}" class="btn btn-warning">edit</a></td>
      <td><a href="{{route('roles.delete',$role->id)}}" class="btn btn-danger">delete</a></td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection