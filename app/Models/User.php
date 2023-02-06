<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function productDetail()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function subscription(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(Subscription::class);
    }

    public function contactUs(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(ContactUs::class);
    }

    public function cart(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(Cart::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
