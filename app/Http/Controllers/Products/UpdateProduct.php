<?php

namespace App\Http\Controllers\Products;

use App\Http\Requests\Product\ProductRequest;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Models\Product;

class UpdateProduct extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function __invoke(ProductRequest $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $data = $request->validated();

        try {
            $updatedProduct = $this->productService->updateProduct($id, $data);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update product'], 500);
        }

        return response()->json($updatedProduct);
    }
}
