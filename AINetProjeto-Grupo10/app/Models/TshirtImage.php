<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class TshirtImage extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'id';
    protected $fillable = ['customer_id', 'category_id', 'name', 'description', 'image_url'];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'tshirt_image_id');
    }
    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
{
    return $this->belongsToMany(Color::class);
}
}