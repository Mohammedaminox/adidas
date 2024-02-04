<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('client.index',["clients"=>$clients]);
    }


    public function create(){
        return view('client.create');
    }


    public function store(Request $request)
{
    $request->validate([
        'UserName'   => 'required|string|max:50',
        'email'      => 'required|email|unique:clients,email|max:50',
        'password'   => 'required|min:8',
        'creditCard' => 'required|integer',
        'adress'    => 'required|string|max:50',
    ]);
    $input = $request->all();
    Client::create($input);
    return redirect()->route('clients.index');
}


public function edit($id){
    $clients = Client::find($id);
    return view('client.edit',['clients'=>$clients]);
}


public function update(Request $request , $id){
    $clients = Client::find($id);
    $clients->update($request->all());
    
    return redirect()->route('clients.index');
}


public function delete(Request $request , $id){
    $clients = Client::find($id);
    $clients->delete($request->all());
    return redirect()->route('clients.index');

}
}
