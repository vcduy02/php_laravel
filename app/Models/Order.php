<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $fillable = [
        'order_date',
        'status',
        'user_id',
        'role_id'
    ];

    public function orderDetails(): HasMany
    {
        return $this->HasMany(OrderDetail::class, 'order_id', 'id');
    }


}
