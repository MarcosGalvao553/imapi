<?php

namespace App\Http\DTOs;

class Product
{
    public ?int $id;
    public ?string $product;
    public ?string $producer;
    public ?string $description;
    public ?string $acquisitionDate;
    public ?string $createdAt;
    public ?string $updatedAt;
    
    public function __construct(
        ?int $id, 
        ?string $product, 
        ?string $producer, 
        ?string $description, 
        ?string $acquisitionDate, 
        ?string $createdAt, 
        ?string $updatedAt
    )
    {
        $this->id = $id;
        $this->product = $product;
        $this->producer = $producer;
        $this->description = $description;
        $this->acquisitionDate = $acquisitionDate;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function fromArray(array $data): Product
    {
        return new self(
            $data['id'] ?? null,
            $data['product'] ?? null,
            $data['producer']  ?? null,
            $data['description'] ?? null,
            $data['acquisition_date']  ?? null,
            $data['created_at'] ?? null,
            $data['updated_at']  ?? null
        );
    }

    public static function toArray(Product $product): array
    {
        return [
            'id' => $product->id(),
            'product' => $product->product(),
            'producer' => $product->producer(),
            'description' => $product->description(),
            'acquisition_date' => $product->acquisitionDate(),
            'created_at' => $product->createdAt(),
            'updated_at' => $product->updatedAt()
        ];
    }

    public function id(): ?int
    {
        return $this->id;
    }
    
    public function product(): ?string
    {
        return $this->product;
    }
    
    public function producer(): ?string
    {
        return $this->producer;
    }
    
    public function description(): ?string
    {
        return $this->description;
    }
    
    public function acquisitionDate(): ?string
    {
        return $this->acquisitionDate;
    }
    
    public function createdAt(): ?string
    {
        return $this->createdAt;
    }
    
    public function updatedAt(): ?string
    {
        return $this->updatedAt;
    }

}
