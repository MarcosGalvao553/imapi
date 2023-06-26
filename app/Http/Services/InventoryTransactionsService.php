<?php

namespace App\Http\Services;

use App\Http\DTOs\InventoryTransaction;
use App\Http\DTOs\ProductQuantity;
use App\Http\Repositories\InventoryTransactionsRepository;
use App\Models\ProductsQuantities;
use App\Http\Repositories\ProductsQuantitiesRepository;
use App\Models\InventoryTransactions;

class InventoryTransactionsService
{
    public InventoryTransactionsRepository $inventoryTransactionsRepository;

    public function __construct(InventoryTransactionsRepository $inventoryTransactionsRepository)
    {
        $this->inventoryTransactionsRepository = $inventoryTransactionsRepository;
    }

    public function index()
    {
        return $this->inventoryTransactionsRepository->index();
    }

    public function create(array $transaction): InventoryTransactions
    {
        $transaction = InventoryTransaction::fromArray($transaction);
        return $this->inventoryTransactionsRepository->create($transaction);
    }

    public function show(int $productId)
    {   
        return $this->inventoryTransactionsRepository->show($productId);
    }
}
