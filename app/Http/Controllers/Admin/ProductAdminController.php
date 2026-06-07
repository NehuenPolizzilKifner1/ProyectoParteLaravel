<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')
            ->paginate(10);

        return view(
            'admin.products.index',
            compact('products')
        );
    }

    public function edit(Product $product){
        return view(
            'admin.products.edit',
            compact('product')
        );
    }

    public function update(Request $request, Product $product){
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Producto actualizado'
            );
    }
}