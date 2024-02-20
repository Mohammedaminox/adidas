@extends("layouts.app")
@section("title","edit_produit")
@section("content")
<form method="post" action="{{route('produits.update',$produits->id)}}" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <div class="mb-3">
    <label for="images" class="form-label">prduitImage</label>
    <input type="file" class="form-control" id="images" name="images">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">produitName</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$produits->name}}">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="{{$produits->description}}">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" id="price" name="price" value="{{$produits->price}}">
  </div>
  <div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach($categories as $categorie) 
        <option value="{{ $categorie->id }}" {{ $categorie->id == $selectedCategoryId ? 'selected' : '' }}>
        {{ $categorie->name }}
            </option>
         @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
@endsection