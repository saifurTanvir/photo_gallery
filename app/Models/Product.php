<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primary_key = 'product_id';
    public $timestamps = false;
    protected $guarded = [];

    public function productImage(){
        return $this->hasMany(ProductImage::class, 'ref_product_id', 'product_id');
    }
}
 