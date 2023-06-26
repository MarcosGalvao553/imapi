<?php

namespace App\Http\Repositories;

use App\Http\DTOs\Product;
use App\Models\Products;
use Exception;

class ProductRepository
{
    public function index(): array
    {
        $products = Products::all()->toArray();

        $products = array_map(function($product){
            return Product::fromArray($product);
        },$products);

        return $products;
    }

    public function create(Product $product): Products
    {
        $createProduct = [];
        $createProduct['product'] = $product->product();
        $createProduct['producer']  = $product->producer();
        $createProduct['description'] = $product->description();
        $createProduct['acquisition_date']  = $product->acquisitionDate();

        $productCreated = Products::create($createProduct);

        return $productCreated;
    }

    public function show(int $id): Product
    {
        $product = Products::where('Products.id',$id)
        ->first()
        ->toArray();

        if(!$product){
            throw new Exception("Produto com id $id nao foi encontrado");
        }

        $product = Product::fromArray($product);

        return $product;
    }

    public function destroy(int $id): int
    {
        return Products::where('Products.id',$id)
            ->delete();
    }

    public function update(array $product): int
    {     
        $update = Products::where('Products.id',$product['id'])
        ->update($product);

        return $update;
    }
}
