@extends("layouts.app")
@section("title","clients")
@section("content")
<a href="{{route('clients.create')}}" type="button" class="btn btn-primary">Add Client</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">CreditCard</th>
      <th scope="col">Adress</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($clients as $client)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$client->UserName}}</td>
        <td>{{$client->email}}</td>
        <td>{{$client->creditCard}}</td>
        <td>{{$client->adress}}</td>
        <td><a href="{{route('clients.edit',$client->id)}}" class="btn btn-warning">edit</a></td>
        <td><a href="{{route('clients.delete',$client->id)}}" class="btn btn-danger">delete</a></td>
    </tr>
@endforeach

</tbody>
</table>
{{$clients->links()}}
@endsection