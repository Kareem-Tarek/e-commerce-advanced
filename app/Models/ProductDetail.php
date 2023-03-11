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
        return $this->belongsTo(SubCategory::class, 'sub_cat_id', 'id');
    }

    public function finalProduct()
    {
        return $this->hasMany(FinalProduct::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedbacks::class);
    }

    public function user_supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id', 'id');
    }

    public function create_user(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function update_user(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function delete_user(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function cart()
    // {
    //     return $this->belongsTo(Cart::class, 'product_id', 'id');
    // }
    public function cart()
    {
        return $this->belongsToMany(Cart::class, 'product_id', 'id');
    }

}
