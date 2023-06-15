<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    use HasFactory;
    protected $primaryKey = 'code';
    protected $fillable = ['name'];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'color_code');
    }
}