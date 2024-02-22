<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Routes;

use App\Models\Permition;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with("permitions")->simplePaginate(6);
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
            foreach ($request->uri as $route) {
                Permition::create(
                    [
                        'role_id' => $lastInsertedId,
                        'route_id' => $route,
                    ]
                );
            }
        }
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $routes = routes::all();
        $permitions = Permition::where('role_id',$id)->get();


    
        

        return view('roles.edit', ['roles' => $role, 'routes' => $routes, 'permitions' => $permitions]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'uri' => 'required|array'
        ]);
    
        // Find the role by ID
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
    
        // Delete existing permissions for the role
        Permition::where('role_id', $id)->delete();
    
        // Add updated permissions
        if ($request->has('uri') && is_array($request->uri)) {
            foreach ($request->uri as $route) {
                Permition::create([
                    'role_id' => $id,
                    'route_id' => $route,
                ]); 
            }
        }
    
        return redirect()->route('roles.index');
    }
    

    public function delete(Request $request, $id)
    {
        $roles = Role::find($id);
        $roles->delete($request->all());

        return redirect()->route('roles.index');
    }
}
