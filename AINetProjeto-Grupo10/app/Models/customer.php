<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'nif',
        'address',
        'default_payment_type',
        'default_payment_ref'
    ];

    public function orders(): HasMany
    {
        return $this->HasMany(Order::class, 'customer_id');
    }

    public function tshirtImages(): HasMany
    {
        return $this->HasMany(TshirtImage::class, 'customer_id');
    }
}
