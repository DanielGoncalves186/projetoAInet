<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nif',
        'address',
        'default_payment_type',
        'default_payment_ref'
    ];

    public function orders(): HasMany
    {
        return $this->HasMany(Order::Class, 'customer_id');
    }

    public function tshirtImages(): HasMany
    {
        return $this->HasMany(TshirtImage::Class, 'customer_id');
    }
}
