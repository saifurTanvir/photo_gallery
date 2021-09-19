<?php

namespace App\Http\Controllers;

use App\Models\Company; 
use App\Models\Shop; 
use App\Models\Product; 
use App\Models\Category; 
use App\Models\Subcategory; 

class CompanyManageController extends Controller
{
    public function index($company_id){
        $company = Company::where('company_id', $company_id)->first();
        return view('company_manage.index', compact('company'));
    }

    public function product_list_by_shop_name($company_id, $shop_id){
        $company = Company::where('company_id', $company_id)->first();
        $products = Product::Where('ref_shop_id', $shop_id)->where('ref_company_id', $company_id)->get();

        return view('product.index', compact('products', 'company'));
    }

    public function product_list_by_category($company_id, $category_id){
        $company = Company::where('company_id', $company_id)->first();
        $products = Product::where('ref_company_id', $company_id)->where('ref_category_id', $category_id)->get();

        return view('product.index', compact('products', 'company'));
    }

    public function product_list_by_company($company_id){
        $company = Company::where('company_id', $company_id)->first();
        $products = Product::where('ref_company_id', $company_id)->get();

        return view('product.index', compact('products', 'company'));
    }
}
 