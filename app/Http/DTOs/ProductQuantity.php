<?php

namespace App\Http\DTOs;

class ProductQuantity
{
    public ?int $id;
    public ?string $productId;
    public ?int $quantity;
    
    public function __construct(
        ?int $id, 
        ?string $productId, 
        ?string $quantity
    )
    {
        $this->id = $id;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public static function fromArray(array $data): ProductQuantity
    {
        return new self(
            $data['id'] ?? null,
            $data['productId'] ?? null,
            $data['quantity']  ?? null
        );
    }

    public static function toArray(ProductQuantity $product): array
    {
        return [
            'id' => $product->id(),
            'productId' => $product->productId(),
            'quantity' => $product->quantity()
        ];
    }

    public function id(): ?int
    {
        return $this->id;
    }
    
    public function productId(): ?string
    {
        return $this->productId;
    }
    
    public function quantity(): ?int
    {
        return $this->quantity;
    }
    
}
