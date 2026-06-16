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

    public function edit(Product $product)
    {
        return view(
            'admin.products.edit',
            compact('product')
        );
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|string|max:255',
            'motor' => 'required|max:255',
            'potencia' => 'required|max:255',
            'aceleracion' => 'required|max:255',
            'category' => 'required|max:255',
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'motor' => $request->motor,
            'potencia' => $request->potencia,
            'aceleracion' => $request->aceleracion,
            'category' => $request->category,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Vehículo actualizado correctamente'
            );
    }
}