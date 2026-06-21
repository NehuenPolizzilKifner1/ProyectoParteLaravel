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

    public function create(){
        return view('admin.products.create');
    }

    #[OA\Post(
        path: "/admin/products",
        summary: "Crear vehículo",
        tags: ["Administración Productos"],
        requestBody: new OA\RequestBody(
            required: true
        ),
        responses: [
            new OA\Response(
                response: 302,
                description: "Vehículo creado"
            )
        ]
    )]

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|string|max:255',
            'motor' => 'required|max:255',
            'potencia' => 'required|numeric',
            'aceleracion' => 'required|numeric',
            'category' => 'required|max:255',
        ]);

        Product::create([
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
                'Vehículo creado correctamente'
            );
    }

    public function edit(Product $product)
    {
        return view(
            'admin.products.edit',
            compact('product')
        );
    }

    #[OA\Put(
        path: "/admin/products/{id}",
        summary: "Actualizar vehículo",
        tags: ["Administración Productos"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 302,
                description: "Vehículo actualizado"
            )
        ]
    )]

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

    #[OA\Delete(
        path: "/admin/products/{id}",
        summary: "Eliminar vehículo",
        tags: ["Administración Productos"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 302,
                description: "Vehículo eliminado"
            )
        ]
    )]

    public function destroy(Product $product){
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Vehículo eliminado correctamente'
            );
    }
}