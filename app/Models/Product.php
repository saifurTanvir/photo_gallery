<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Company;
use App\Models\Shop;

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

    public function company(){
        return $this->belongsTo(Company::class, 'ref_company_id', 'company_id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class, 'ref_shop_id', 'shop_id');
    }
}
  