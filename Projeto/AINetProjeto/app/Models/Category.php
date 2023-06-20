<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function tshirtImages(): HasMany
    {
        return $this->HasMany(TshirtImage::Class, 'category_id');
    }
}
