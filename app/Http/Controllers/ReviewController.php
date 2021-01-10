<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\product\ReviewResource;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
    }




    public function store(ReviewRequest $request , Product $product)
    {
        $vail = $request->except("body");
        $vail["review"]  =$request->body;
        $vail['product_id']  =$product->id;
        $review = Review::create($vail);
        return response()->json([
            "data" => new ReviewResource($review)], 201);

    }


    public function show(Product $product ,Review $review )
    {
        return response()->json([
            "data" => new ReviewResource($review)], 200);
    }

    public function update(Request $request, Product $product ,Review $review )
    {
        $vail = $request->except("body");
        $vail["review"]  =$request->body;
        $vail["product_id"]  =$product->id;

        $review->update($vail);
        return response()->json([
            "data" => new ReviewResource($review)], 200);
    }

    public function destroy(Product $product,Review $review)
    {
        $review->delete();
        return response()->json(null, 204);
    }
}
