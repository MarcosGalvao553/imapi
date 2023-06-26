<?php

namespace App\Http\Services;

use App\Http\DTOs\ProductQuantity;
use App\Models\ProductsQuantities;
use App\Http\Repositories\ProductsQuantitiesRepository;

class ProductsQuantitiesService
{
    public ProductsQuantitiesRepository $productsQuantitiesRepository;

    public function __construct(ProductsQuantitiesRepository $productsQuantitiesRepository)
    {
        $this->productsQuantitiesRepository = $productsQuantitiesRepository;
    }

    public function index()
    {
        return $this->productsQuantitiesRepository->index();
    }

    public function create(array $product): ProductsQuantities
    {
        $product = ProductQuantity::fromArray($product);
        return $this->productsQuantitiesRepository->create($product);
    }

    public function show(int $id)
    {   
        return $this->productsQuantitiesRepository->show($id);
    }

    public function destroy(int $id)
    {   
        return $this->productsQuantitiesRepository->destroy($id);
    }

    public function update(array $product)
    {   
        return $this->productsQuantitiesRepository->update($product['productId'],$product['quantity']);
    }
}
