<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index(Request $request)
    {
        $produits = Produit::with("categories")->get();

        return view('produit.index')->with('produits', $produits);
    }
    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('produit.create', compact('categories'));
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:50',
            'price' => 'required|integer',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $input = $request->all();

        if ($request->hasFile("images")) {
            $imageName = $request->file('images')->getClientOriginalName();
            $request->file("images")->move(public_path("assets"), $imageName);
            $input['images'] = $imageName;
        }
        Produit::create($input);
        return redirect()->route('produits.index');
    }
    public function edit($id)
    {
        $produits = Produit::find($id);
        $categories = Category::all();
        $selectedCategoryId = $produits->category_id;
        return view('produit.edit', ['produits' => $produits, 'categories' => $categories, 'selectedCategoryId' => $selectedCategoryId]);
    }

    public function update(Request $request, $id)
    {
        $produit = Produit::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $upinput = $request->all();

        if ($request->hasFile('images')) {
            $imageName = $request->file('images')->getClientOriginalName();

            $request->file('images')->move(public_path('assets'), $imageName);

            $upinput['images'] = $imageName;
        }
        $produit->update($upinput);
        return redirect()->route('produits.index');
    }
    public function delete(Request $request, $id)
    {
        $produits = Produit::find($id);
        $produits->delete($request->all());
        return redirect()->route('produits.index');
    }
}
