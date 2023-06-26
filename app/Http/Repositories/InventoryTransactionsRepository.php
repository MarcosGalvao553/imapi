<?php

namespace App\Http\Repositories;

use App\Http\DTOs\InventoryTransaction;
use App\Models\InventoryTransactions;
use Exception;

class InventoryTransactionsRepository
{
    public function index(): array
    {
        $transactions = InventoryTransactions::all()->toArray();

        $transactions = array_map(function($product){
            return InventoryTransaction::fromArray($product);
        },$transactions);

        return $transactions;
    }

    public function create(InventoryTransaction $transaction): InventoryTransactions
    {
        $createTransaction = [];
        $createTransaction['product_id'] = $transaction->productId();
        $createTransaction['quantity']  = $transaction->quantity();
        $createTransaction['operation'] = $transaction->operation();
        $createTransaction['user_id']  = $transaction->userId();

        $transactionCreated = InventoryTransactions::create($createTransaction);

        return $transactionCreated;
    }

    public function show(int $productId): array
    {
        $transactions = InventoryTransactions::where('InventoryTransactions.product_id',$productId)
        ->get();

        if(!$transactions){
            throw new Exception("Transacoes para o produto $productId nao foi encontrado");
        }

        $transactions = $transactions->toArray();
        $transactions = array_map(function($transaction){
            return InventoryTransaction::fromArray($transaction);
        },$transactions);

        return $transactions;
    }
}
