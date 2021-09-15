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
        $products = Product::Where('ref_shop_id', $shop_id)->where('ref_company_id', $company_id)->get();
        $categories = Category::where('ref_company_id', $company_id)->get();
        $shops = Shop::where('ref_company_id', $company_id)->get();
        $subcategories = Subcategory::get();

        return view('product.index', compact('products', 'categories', 'subcategories', 'shops'));
    }

    public function product_list_by_category($company_id, $category_id){
        $products = Product::where('ref_company_id', $company_id)->where('ref_category_id', $category_id)->get();
        $categories = Category::where('ref_company_id', $company_id)->get();
        $shops = Shop::where('ref_company_id', $company_id)->get();
        $subcategories = Subcategory::get();

        return view('product.index', compact('products', 'categories', 'subcategories', 'shops'));
    }

    public function product_list_by_company($company_id){
        $products = Product::where('ref_company_id', $company_id)->get();
        $categories = Category::where('ref_company_id', $company_id)->get();
        $shops = Shop::where('ref_company_id', $company_id)->get();
        $subcategories = Subcategory::get();

        return view('product.index', compact('products', 'categories', 'subcategories', 'shops'));
    }
}
 