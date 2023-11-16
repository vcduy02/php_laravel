<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_detail';
    public $timestamps = true;
    protected $fillable = [
        'order_id',
        'user_name',
        'email',
        'phone_number',
        'address',
        'description',
        'payment',
        'product_id',
        'quantity',
        'price',
    ];
    

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
