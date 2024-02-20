@extends("layouts.app")
@section("title","edit_categorie")
@section("content")
<form method="post" action="{{route('categories.update',$categories->id)}}">
    @csrf
    @method("PATCH")
  <div class="mt-5">
    <label for="name" class="form-label">categoryName</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$categories->name}}">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection