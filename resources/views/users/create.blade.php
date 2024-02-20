@extends("layouts.app")
@section("title","create_user")
@section("content")
<form method="post" action="{{route('users.store')}}">
    @csrf
  <div class="mb-3">
    <label for="UserName" class="form-label">UserName</label>
    <input type="text" class="form-control" id="UserName" name="name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select name="role_id" id="role" class="form-control">
        @foreach($roles as $role)
        <option value="{{ $role->id }}">{{ $role->name }}</option>
         @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection