<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showHome()
    {
        $produits = Produit::with("categories")->simplePaginate(3);

        return view('users.showHome')->with('produits', $produits);
    }

    public function index()
    {
        $users = User::simplePaginate(3);
        $roles = Role::all();
        return view('users.index', ["users" => $users, "roles" => $roles]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required',

        ]);
        $input = $request->all();
        User::create($input);
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::all();
        $selectedRoleId = $users->role_id;  
        return view('users.edit', ['users' => $users, 'roles' => $roles, 'selectedRoleId' => $selectedRoleId]);
    }


    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->update($request->all());

        return redirect()->route('users.index');
    }
    public function delete(Request $request, $id)
    {
        $users = User::find($id);
        $users->delete($request->all());
        return redirect()->route('users.index');
    }
}
