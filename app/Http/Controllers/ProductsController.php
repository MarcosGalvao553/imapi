<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Services\ProductService;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductsController extends Controller
{
    public ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
        $this->middleware('auth:api');
    }

    public function index(): JsonResponse
    {
        try {
            $create = $this->productService->index();
        
            return response()->json([
                "success" => true,
                "message" => "Lista com todos os Produtos",
                "data" => $create
            ]);
        } catch (Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Nao foi possivel retornar lista de Produtos!",
                "data" => [
                    "message" => $e->getMessage(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine()
                ]
            ]);
        }
    }

    public function create(CreateProductRequest $request): JsonResponse
    {
        $product = $request->validated();

        try {
            $create = $this->productService->create($product);
        
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
            $product = $this->productService->show($id);
        
            return response()->json([
                "success" => true,
                "message" => "Produto com id $id",
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
            $delete = $this->productService->destroy($id);
        
            return response()->json([
                "success" => true,
                "message" => "Produto com id $id deletado com sucesso!",
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

    public function update(UpdateProductRequest $request): JsonResponse
    {
        $product = $request->validated();
        try {
            $update = $this->productService->update($product);
        
            return response()->json([
                "success" => true,
                "message" => "Produto com id {$product['id']} atualizado com sucesso!",
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
