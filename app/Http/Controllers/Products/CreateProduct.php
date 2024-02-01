<?php

namespace App\Http\Controllers\Products;

use App\Http\Requests\Product\ProductRequest;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Models\Product;

class CreateProduct extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function __invoke(ProductRequest $request)
    {
        return $this->productService->createProduct($request->validated());
    }
}
