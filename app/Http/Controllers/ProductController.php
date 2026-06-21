<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use OpenApi\Attributes as OA;

class ProductController extends Controller{
    
    #[OA\Get(
        path: "/api/products",
        summary: "Listado de vehículos",
        tags: ["Productos"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Listado obtenido correctamente"
            )
        ]
    )]

    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category')) {
            $query->where(
                'category',
                $request->category
            );
        }

        if ($request->filled('q')) {
            $query->where(
                'name',
                'like',
                '%' . $request->q . '%'
            );
        }

        $products = $query->paginate(10);

        return ProductResource::collection(
            $products
        );
    }

    #[OA\Get(
        path: "/api/products/{id}",
        summary: "Obtener un vehículo",
        tags: ["Productos"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "ID del vehículo",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Vehículo encontrado"
            ),
            new OA\Response(
                response: 404,
                description: "Vehículo no encontrado"
            )
        ]
    )]
    
    public function show(Product $product){
        return new ProductResource(
            $product
        );
    }
}