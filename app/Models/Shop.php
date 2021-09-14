<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shop';
    protected $primary_key = 'shop_id';
    public $timestamps = false; 
    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Company::class, 'ref_company_id', 'company_id');
    } 

}
