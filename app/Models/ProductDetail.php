<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products_details';

    protected $guarded = [];

    public function subCategory()
    {
        return $this->BelongsTo(SubCategory::class, 'sub_cat_id', 'id');
    }

    public function finalProduct()
    {
        return $this->hasMany(finalProduct::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedbacks::class);
    }

    public function user_supplier()
    {
        return $this->BelongsTo(User::class, 'supplier_id', 'id');
    }

    // public function cart()
    // {
    //     return $this->BelongsTo(Cart::class, 'product_id', 'id');
    // }
    public function cart()
    {
        return $this->BelongsToMany(Cart::class, 'product_id', 'id');
    }

}
