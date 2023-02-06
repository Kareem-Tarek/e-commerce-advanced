<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function finalProduct()
    {
        return $this->belongsTo(finalProduct::class, 'product_id', 'id');
    }
}
