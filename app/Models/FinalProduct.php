<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinalProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'final_products';

    protected $guarded = [];

    public function productDetail()
    {
        return $this->BelongsTo(ProductDetail::class, 'product_id', 'id');
    }

    public function comparison()
    {
        return $this->hasMany(Comparison::class);
    }

    public function wishlist()
    {
        return $this->hasMany(wishlist::class);
    }

}
