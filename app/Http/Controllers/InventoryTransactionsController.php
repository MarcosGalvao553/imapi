<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInventoryTransactionRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateProductRequest;
use App\Http\Services\InventoryTransactionsService;

class InventoryTransactionsController extends Controller
{
    public InventoryTransactionsService $inventoryTransactionsService;

    public function __construct(InventoryTransactionsService $inventoryTransactionsService)
    {
        $this->inventoryTransactionsService = $inventoryTransactionsService;
        $this->middleware('auth:api');
    }

    public function index(): JsonResponse
    {
        try {
            $create = $this->inventoryTransactionsService->index();
        
            return response()->json([
                "success" => true,
                "message" => "Lista com todas as transacoes",
                "data" => $create
            ]);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Nao foi possivel retornar lista de transacoes!",
                "data" => [
                    "message" => $e->getMessage(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine()
                ]
            ]);
        }
    }

    public function create(CreateInventoryTransactionRequest $request): JsonResponse
    {
        $transaction = $request->validated();

        try {
            $create = $this->inventoryTransactionsService->create($transaction);
        
            return response()->json([
                "success" => true,
                "message" => "Transacao criada com sucesso!",
                "data" => $create
            ]);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Nao foi possivel criar transacao",
                "data" => [
                    "message" => $e->getMessage(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine()
                ]
            ]);
        }
    }

    public function show(int $productId): JsonResponse
    {
        try {
            $transactions = $this->inventoryTransactionsService->show($productId);
        
            return response()->json([
                "success" => true,
                "message" => "transacoes para produto com id $productId",
                "data" => $transactions
            ]);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Nao foi possivel encontrar transacoes para o produto $productId!",
                "data" => [
                    "message" => $e->getMessage(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine()
                ]
            ]);
        }
    }
}
