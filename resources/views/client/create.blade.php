@extends("layouts.app")
@section("content")
<form method="post" action="{{route('clients.store')}}">
    @csrf
  <div class="mb-3">
    <label for="UserName" class="form-label">clientName</label>
    <input type="text" class="form-control" id="UserName" name="UserName">
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
    <label for="creditCard" class="form-label">creditCard</label>
    <input type="text" class="form-control" id="creditCard" name="creditCard">
  </div>
  <div class="mb-3">
    <label for="adress" class="form-label">Adress</label>
    <input type="text" class="form-control" id="adress" name="adress">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection