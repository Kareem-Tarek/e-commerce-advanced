<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinalProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function productDetail()
    {
        return $this->BelongsTo(productDetail::class, 'product_id', 'id');
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
