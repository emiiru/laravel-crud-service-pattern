<?php

namespace App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Resources\Product\ProductsResource;
use App\Models\Product;

class ProductService
{

    public function getProducts(): ProductsResource
    {
        $products = Product::all();
        return new ProductsResource($products);
    }

    public function createProduct(array $data): ProductsResource
    {
        return new ProductsResource(Product::create($data));
    }

    public function updateProduct(int $id, array $data): ProductsResource
    {
        $product = Product::findOrFail($id);

        $product->fill($data)->save();

        return new ProductsResource($product);
    }

    public function showProduct(Product $product): ProductsResource
    {
        return new ProductsResource($product);
    }

    public function deleteProduct($product)
    {
        $product->delete();
        return 'Product Deleted!';
    }
}