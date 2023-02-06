<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function Category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Category::class, 'cat_id', 'id');
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(ProductDetail::class);
    }
}
