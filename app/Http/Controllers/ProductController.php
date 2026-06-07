<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller{
    
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

    public function show(Product $product){
        return new ProductResource(
            $product
        );
    }
}