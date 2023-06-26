<?php

namespace App\Http\DTOs;

class InventoryTransaction
{
    public ?int $id;
    public string $productId;
    public int $quantity;
    public bool $operation;
    public int $userId;
    public ?string $updatedAt;
    public ?string $createdAt;

    public function __construct(
        ?int $id,
        string $productId,
        int $quantity,
        bool $operation,
        int $userId,
        ?string $updatedAt,
        ?string $createdAt
    ) 
    {
        $this->id = $id;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->operation = $operation;
        $this->userId = $userId;
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
    }

    public static function fromArray(array $data): InventoryTransaction
    {
        return new self(
            $data['id'] ?? null,
            $data['product_id'],
            $data['quantity'],
            $data['operation'],
            $data['user_id'],
            $data['updated_at'] ?? null,
            $data['created_at'] ?? null
        );
    }

    public static function toArray(InventoryTransaction $transaction): array
    {
        return [
            'id' => $transaction->id(),
            'product_id' => $transaction->productId(),
            'quantity' => $transaction->quantity(),
            'operation' => $transaction->operation(),
            'user_id' => $transaction->userId(),
            'updated_at' => $transaction->updatedAt(),
            'created_at' => $transaction->createdAt()
        ];
    }


    public function id(): ?int
    {
        return $this->id;
    }

    public function productId(): string
    {
        return $this->productId;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function operation(): bool
    {
        return $this->operation;
    }

    public function userId(): ?int
    {
        return $this->userId;
    }

    public function updatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function createdAt(): ?string
    {
        return $this->createdAt;
    }
}