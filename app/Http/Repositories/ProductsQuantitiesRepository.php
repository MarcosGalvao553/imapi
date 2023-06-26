<?php

namespace App\Http\Repositories;

use App\Http\DTOs\ProductQuantity;
use App\Models\ProductsQuantities;
use Exception;

class ProductsQuantitiesRepository
{
    public function index(): array
    {
        $products = ProductsQuantities::all()->toArray();

        $products = array_map(function($product){
            return ProductQuantity::fromArray($product);
        },$products);

        return $products;
    }

    public function create(ProductQuantity $product): ProductsQuantities
    {
        $createProduct = [];
        $createProduct['product_id']  = $product->productId();
        $createProduct['quantity'] = $product->quantity();

        $productCreated = ProductsQuantities::create($createProduct);

        return $productCreated;
    }

    public function show(int $id): ProductQuantity
    {
        $product = ProductsQuantities::where('ProductsQuantities.id',$id)
        ->first();

        if(!$product){
            throw new Exception("Produto com id $id nao foi encontrado");
        }

        $product = $product->toArray();
        $product = ProductQuantity::fromArray($product);

        return $product;
    }

    public function destroy(int $id): int
    {
        return ProductsQuantities::where('ProductsQuantities.id',$id)
            ->delete();
    }

    public function update(int $productId, int $quantity): int
    {     
        $update = ProductsQuantities::where('ProductsQuantities.product_id',$productId)
        ->update([
            "quantity" => $quantity
        ]);

        return $update;
    }
}
