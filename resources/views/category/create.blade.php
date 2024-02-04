@extends("layouts.app")
@section("content")
<form method="post" action="{{route('categories.store')}}">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">categoryName</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection