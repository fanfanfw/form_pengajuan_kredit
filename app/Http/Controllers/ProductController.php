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
    return view('products.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public'); // Simpan ke folder 'storage/app/public/products'
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        return response()->json(Product::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }

    // public function dashboard()
    // {
    //     if (!auth()->check()) {
    //         dd('User not logged in');
    //     }
        
    //     $products = Product::all();
    //     $user = auth()->user();
    //     return view('dashboard', compact( 'products','user'));
    // }

    public function dashboard()
{

    if (!auth()->check()) {
        dd('User not logged in');
    }

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
