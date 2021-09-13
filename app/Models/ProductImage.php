<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'attachment';
    protected $primary_key = 'attachment_id';
    public $timestamps = false;
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class, 'ref_product_id', 'product_id');
    }
}
