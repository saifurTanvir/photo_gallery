<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primary_key = 'category_id';
    public $timestamps = false; 
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Company::class, 'ref_company_id', 'company_id');
    }

    public function subcategory(){
        return $this->hasMany(Subcategory::class, 'ref_category_id', 'category_id');
    }
}
