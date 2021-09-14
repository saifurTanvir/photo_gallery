<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Company;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategory';
    protected $primary_key = 'subcategory_id';
    public $timestamps = false;
    protected $guarded = [];  
    
    public function category(){
        return $this->belongsTo(Category::class, 'ref_category_id', 'category_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'ref_company_id', 'company_id');
    }
}
