<?php

namespace App\Models;

use Library\Framework\Core\Model;

class Test extends Model
{
    protected static string $table = "test";
    protected array $fillable = ["id", "name", "category", "stock", "price", "created_at"];
}