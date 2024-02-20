@extends("layouts.app")
@section("title","edit_client")
@section("content")
<form method="post" action="{{route('clients.update',$clients->id)}}">
    @csrf
    @method("PATCH")
  <div class="mb-3">
    <label for="UserName" class="form-label">clientName</label>
    <input type="text" class="form-control" id="UserName" name="UserName" value="{{$clients->UserName}}">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$clients->email}}">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="{{$clients->password}}">
  </div>
  <div class="mb-3">
    <label for="creditCard" class="form-label">creditCard</label>
    <input type="text" class="form-control" id="creditCard" name="creditCard" value="{{$clients->creditCard}}">
  </div>
  <div class="mb-3">
    <label for="adress" class="form-label">Adress</label>
    <input type="text" class="form-control" id="adress" name="adress" value="{{$clients->adress}}">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection