<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function tshirtImages(): HasMany
    {
        return $this->HasMany(TshirtImage::class, 'category_id');
    }
}
