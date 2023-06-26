<?php

namespace App\Http\Services;

use App\Http\DTOs\Product;
use App\Http\Repositories\ProductRepository;
use App\Models\Products;

class ProductService
{
    public ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->productRepository->index();
    }

    public function create(array $product): Products
    {
        $product = Product::fromArray($product);
        return $this->productRepository->create($product);
    }

    public function show(int $id)
    {   
        return $this->productRepository->show($id);
    }

    public function destroy(int $id)
    {   
        return $this->productRepository->destroy($id);
    }

    public function update(array $product)
    {   
        $product = array_filter($product, function ($value) {
            return $value !== null;
        });

        return $this->productRepository->update($product);
    }
}
