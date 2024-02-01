<?php

namespace App\Http\Controllers\Products;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Models\Product;

class DeleteProduct extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function __invoke($id)
    {
        try {
            $product = Product::findOrFail($id);
            return $this->productService->deleteProduct($product);
        } catch (ModelNotFoundException $exception) {
            return response()->json('No Product Found', 422);
        }
    }
}
