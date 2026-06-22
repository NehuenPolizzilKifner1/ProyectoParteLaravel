<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{
    public function productReviews(Product $product)
    {
        return ReviewResource::collection(
            $product->reviews()->with('user')->get()
        );
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'stars'   => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $review = $product->reviews()->create([
            'user_id'     => $request->user()->id,
            'stars'       => $request->stars,
            'comment'     => $request->comment,
            'review_date' => now()->toDateString(),
        ]);

        $review->load('user');

        return new ReviewResource($review);
    }
}
