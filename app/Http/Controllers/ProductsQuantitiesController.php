<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductQuantityRequest;
use App\Http\Requests\UpdateProductQuantityRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Services\ProductsQuantitiesService;

class ProductsQuantitiesController extends Controller
{
    public ProductsQuantitiesService $productsQuantitiesService;

    public function __construct(ProductsQuantitiesService $productsQuantitiesService)
    {
        $this->productsQuantitiesService = $productsQuantitiesService;
        $this->middleware('auth:api');
    }

    public function index(): JsonResponse
    {
        try {
            $create = $this->productsQuantitiesService->index();
        
            return response()->json([
                "success" => true,
                "message" => "Lista com todos os Produtos x quantidade",
                "data" => $create
            ]);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Nao foi possivel retornar lista de Produtos x quantidade!",
                "data" => [
                    "message" => $e->getMessage(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine()
                ]
            ]);
        }
    }

    public function create(CreateProductQuantityRequest $request): JsonResponse
    {
        $product = $request->validated();

        try {
            $create = $this->productsQuantitiesService->create($product);
        
            return response()->json([
                "success" => true,
                "message" => "Produto criado com sucesso!",
                "data" => $create
            ]);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Nao foi possivel cadastrar Produto!",
                "data" => [
                    "message" => $e->getMessage(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine()
                ]
            ]);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $product = $this->productsQuantitiesService->show($id);
        
            return response()->json([
                "success" => true,
                "message" => "Produto x Quantidade com id $id",
                "data" => $product
            ]);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Nao foi possivel encontrar Produto!",
                "data" => [
                    "message" => $e->getMessage(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine()
                ]
            ]);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $delete = $this->productsQuantitiesService->destroy($id);
        
            return response()->json([
                "success" => true,
                "message" => "Produto x quantidade com id $id deletado com sucesso!",
                "data" => $delete
            ]);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Nao foi possivel deletar Produto!",
                "data" => [
                    "message" => $e->getMessage(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine()
                ]
            ]);
        }
    }

    public function update(UpdateProductQuantityRequest $request): JsonResponse
    {
        $product = $request->validated();
        try {
            $update = $this->productsQuantitiesService->update($product);
        
            return response()->json([
                "success" => true,
                "message" => "Quantidade do produto {$product['productId']} atualizado com sucesso!",
                "data" => $update
            ]);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Nao foi possivel atualizado Produto!",
                "data" => [
                    "message" => $e->getMessage(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine()
                ]
            ]);
        }
    }
}
