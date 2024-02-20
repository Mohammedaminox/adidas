@extends("layouts.app")
@section("title","categories")
@section("content")
<a href="{{route('categories.create')}}" type="button" class="btn btn-primary">Add Category</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $categorie)
    <tr>
      <th scope="row">{{$categorie->id}}</th>
      <td>{{$categorie->name}}</td>
      <td><a href="{{route('categories.edit',$categorie->id)}}"  class="btn btn-warning">edit</a></td>
      <td><a href="{{route('categories.delete',$categorie->id)}}" class="btn btn-danger">delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$categories->links()}}
@endsection