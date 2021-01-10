<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:api')->except('show','index');
    }

    public function index()
    {
        return  ProductResource::collection(Product::paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(ProductRequest $request)
    {
        $valid = $request->except("description");
        $valid['details'] = $request->description;
        $product = Product::create($valid);
        $productResource = new ProductResource($product);
        return response()->json($productResource,Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        //return $product;
        return  ProductResource::make($product);
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        $vaild = $request->except("description");
        if ($request->description) {
            $vaild["details"] = $request->description;
        }
        $updated = $product->update($vaild);
        return Response()->json($updated, Response::HTTP_ACCEPTED);
    }


    public function destroy(Product $product)
    {
        //
    }
}
