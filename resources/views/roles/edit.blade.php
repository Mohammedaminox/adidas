@extends("layouts.app")
@section("title","edit_role")
@section("content")
<form method="post" action="{{route('roles.update',$roles->id)}}">
  @csrf
  @method("PATCH")

  <div class="mb-3">
    <label for="name" class="form-label">RoleName</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$roles->name}}">
  </div>

  <div class="mb-3">
    <label class="form-label">Permitons</label>
    <div>
    @foreach($routes as $route)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="uri[]" id="route{{ $route->id }}" value="{{ $route->id }}" 
               {{ $permitions->contains('route_id', $route->id) ? 'checked' : '' }}>
        <label class="form-check-label" for="route{{ $route->id }}">
            {{ $route->uri }}
        </label>
    </div>
@endforeach

    </div>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection