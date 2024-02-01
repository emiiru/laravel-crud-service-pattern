<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Models\Product;

class ShowProduct extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function __invoke(Product $product)
    {
        return $this->productService->showProduct($product);
    }
}
