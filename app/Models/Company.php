<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Shop;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $primary_key = 'company_id';
    public $timestamps = false; 
    protected $guarded = [];

    public function category(){
        return $this->hasMany(Category::class, 'ref_company_id', 'company_id');
    }

    public function shop(){
        return $this->hasMany(Shop::class, 'ref_company_id', 'company_id');
    }

    public function subcategory(){
        return $this->hasMany(Subcategory::class, 'ref_company_id', 'company_id');
    }
}
