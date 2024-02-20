@extends("layouts.app")
@section("title","produit")
@section("content")
<a href="{{route('produits.create')}}" type="button" class="btn btn-primary">Add Produit</a>
<table class="table" id="amin">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">Name</th>
      <th scope="col">description</th>
      <th scope="col">price</th>
      <th scope="col">CategoryName</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($produits as $produit)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>
            <img src="{{asset('assets/'.$produit->images)}}" width="45">
            
        </td>
        <td>{{$produit->name}}</td>
        <td>{{$produit->description}}</td>
        <td>{{$produit->price}}</td>
        <td>
           {{$produit->categories->name }}
        </td>
        <td><a href="{{route('produits.edit',$produit->id)}}" class="btn btn-warning">edit</a></td>
        <td><a href="{{route('produits.delete',$produit->id)}}" class="btn btn-danger">delete</a></td>
    </tr>
@endforeach

  </tbody>
</table>
@endsection