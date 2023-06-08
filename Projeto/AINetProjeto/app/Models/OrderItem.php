<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = ['order_id', 'tshirt_image_id', 'color_code', 'size', 'qty', 'unit_price', 'sub_total'];

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function colors(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
    public function tshirt_images(): BelongsTo
    {
        return $this->belongsTo(TshirtImage::class);
    }
}
