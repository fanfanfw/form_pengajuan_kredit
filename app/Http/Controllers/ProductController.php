<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        return response()->json(Product::all());
    }

    public function create()
    {
        return view('create');
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    Product::create([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    return redirect()->route('products.dashboard')->with('success', 'Produk berhasil ditambahkan!');
}

    public function show($id)
    {
        return response()->json(Product::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('products.dashboard')->with('success', 'Produk berhasil diperbarui!');
    }

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.dashboard')->with('success', 'Produk berhasil dihapus!');
}



    public function dashboard()
{

    $user = auth()->user();
    $products = Product::all();
    return view('products.dashboard', compact('products', 'user'));
}

    public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}


}
