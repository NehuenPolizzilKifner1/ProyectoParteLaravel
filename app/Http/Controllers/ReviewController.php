<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{
    public function productReviews(Product $product){
        return ReviewResource::collection(
            $product->reviews
        );
    }
}
