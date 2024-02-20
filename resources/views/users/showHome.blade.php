@extends("layouts.app")
@section("content")
@foreach($produits as $produit)
<div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('assets/'.$produit->images) }}" class="img-fluid rounded-start" alt="Product Image" style="width: 200px; height: 200px">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $produit->name }}</h5>
        <p class="card-text">{{ $produit->description }}</p>
        <p class="card-text"><strong>Price:</strong> {{ $produit->price }} $</p>
        <p class="card-text"><strong>Category:</strong> {{ $produit->categories->name }}</p>
      </div>
    </div>
  </div>
</div>
@endforeach

{{ $produits->links() }}
@endsection
