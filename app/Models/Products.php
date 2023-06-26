<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $connection = 'mysql';
    protected $table = 'Products';
    protected $fillable = [
        "id",
        "product",
        "producer",
        "description",
        "acquisition_date"
    ];
}