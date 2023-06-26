<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryTransactions extends Model
{
    protected $connection = 'mysql';
    protected $table = 'InventoryTransactions';
    protected $fillable = [
        "id",
        "product_id",
        "quantity",
        "operation",
        "user_id"
    ];
}