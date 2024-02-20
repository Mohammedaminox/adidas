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
        @foreach($permitions as $permition)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permition_ids[]" id="permition{{ $permition->id }}" value="{{ $permition->id }}">
                <label class="form-check-label" for="permition{{ $permition->id }}">
                    {{ $permition->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection