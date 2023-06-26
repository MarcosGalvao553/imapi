<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsQuantities extends Model
{
    protected $connection = 'mysql';
    protected $table = 'ProductsQuantities';
    public $timestamps = false;
    protected $fillable = [
        "id",
        "product_id",
        "quantity"
    ];
}