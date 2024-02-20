<?php

namespace App\Http\Controllers;

use App\Models\Permition;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Routes;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with("permitions")->get();
        return view('roles.index')->with('roles', $roles);
    }

    public function create()
    {
        $routes = Routes::all();
        return view('roles.create', compact('routes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'uri' => 'required|array'
        ]);
        $roles = new Role();
        $roles->name = $request->name;
        $roles->save();
        $lastInsertedId = $roles->id;
        if ($request->has('uri') && is_array($request->uri)) {
            foreach ($request->uri as $permition) {
                permition::create(
                    [
                        'role_id' => $lastInsertedId,
                        'route_id' => $permition,
                    ]
                );
            }
        }
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $roles = Role::find($id);
        $permitons = Permition::all();
        // $selectedCategoryId = $produits->category_id;
        return view('role.edit', ['roles' => $roles, 'permitons' => $permitons]);
    }

    public function update(Request $request, $id)
    {
        $roles = Role::find($id);
        $roles->update($request->all());

        return redirect()->route('roles.index');
    }

    public function delete(Request $request, $id)
    {
        $roles = Role::find($id);
        $roles->delete($request->all());

        return redirect()->route('roles.index');
    }
}
