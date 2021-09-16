<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Company;

use DB; 
class ProductController extends Controller
{
    public function index($company_id){
        $company = Company::where('company_id', $company_id)->first();
        $products = Product::where('ref_company_id', $company_id)->get();

        return view('product.index', compact('company', 'products'));
    }

    public function create($company_id){
        $company = Company::where('company_id', $company_id)->first();
        return view('product.create', compact('company'));
    }

    public function store(Request $req, $company_id){

        $data = array(
            "product_name" => request()->input('product_name'),
            "ref_category_id" => request()->input('ref_category_id'),
            "product_height" => request()->input('product_height'),
            "product_size" => request()->input('product_size'),
            "product_creation_date" => request()->input('product_creation_date'),
            "product_warranty" => request()->input('product_warranty'),
            "product_manufacture_place" => request()->input('product_manufacture_place'),
            "product_weight" => request()->input('product_weight'),
            "ref_parent_category_id" => request()->input('ref_parent_category_id'),
            "product_width" => request()->input('product_width'),
            "product_price" => request()->input('product_price'),
            "product_expire_date" => request()->input('product_expire_date'),
            "product_quality" => request()->input('product_quality'),
            "product_manufacturer_name" => request()->input('product_manufacturer_name'),
            "product_detail" => request()->input('product_detail'),
            "product_stock" => request()->input('product_stock'),
            "ref_company_id" => $company_id
        );
        
        $success = Product::create($data);
        $product_id = $success->id;
        // dd($product_id);
        if($success){

            $attach_files = $req->file('file');
            
            if($attach_files){
                foreach ($attach_files as $attach_file) {
                    $attach_file_name = hexdec(uniqid());
                    $ext = strtolower($attach_file->getClientOriginalExtension());
                    $attach_file_full_name = $attach_file_name . '.' . $ext;
                    $upload_path = 'images/';
                    $file_url = $upload_path . $attach_file_full_name;
                    $success = $attach_file->move($upload_path, $attach_file_full_name);
                    $attached = array();
                    $attached = [
                        'attachment_original_name' => $attach_file->getClientOriginalName(),
                        'attachment_url' => $file_url,
                        'ref_product_id' => $product_id
                    ];
                    
                    $insert = ProductImage::create($attached);
                }
            }
            
            return redirect()->route('product.index', $company_id)->with('success', 'Product added successfully.');
        }else{
            return redirect()->route('product.index', $company_id)->with('error', 'Failed to add product.');

        } 
    }

    public function show($product_id){
        $product = Product::where('product_id', $product_id)->first();
        return view('product.show', compact('product'));
    }

    public function edit($product_id){
        $product = Product::where('product_id', $product_id)->first();
        return view('product.edit', compact('product'));
    }

    public function update($product_id){
        $product = Product::where('product_id', $product_id)->first();
        $success = Product::Where('product_id', $product_id)->update(request()->except(['_token']));

        if($success){
            return redirect()->route('product.index', $product->company->company_id)->with('success', 'Product updated successfully.');
        }else{
            return redirect()->route('product.index', $product->company->company_id)->with('error', 'Failed to update product.');

        } 
    }

    public function delete($product_id){
        $product = Product::where('product_id', $product_id)->first();
        $productImages = $product->productImage;
        foreach($productImages AS $productImage){
            if(file_exists($productImage->attachment_url)){
                @unlink($productImage->attachment_url);
            }
        }
        $productImagesRemoved = $product->productImage()->delete();
        $productRemoved = Product::where('product_id', $product_id)->delete();

        if($productRemoved){
            return redirect()->route('product.index', $product->company->company_id)->with('success', 'Product deleted successfully.');
        }else{
            return redirect()->route('product.index', $product->company->company_id)->with('error', 'Failed to delete product.');

        } 
    }

    public function make_active($product_id){
        $product = Product::where('product_id', $product_id)->first();
        $success = Product::where('product_id', $product_id)->update(['product_active' => 1]);

        if($success){
            return redirect()->route('product.index', $product->company->company_id)->with('success', 'Product activated successfully.');
        }else{
            return redirect()->route('product.index', $product->company->company_id)->with('error', 'Failed to activate product.');

        } 
    }

    public function make_inactive($product_id){
        $product = Product::where('product_id', $product_id)->first();
        $success = Product::where('product_id', $product_id)->update(['product_active' => 0]);

        if($success){
            return redirect()->route('product.index', $product->company->company_id)->with('success', 'Product inactivated successfully.');
        }else{
            return redirect()->route('product.index', $product->company->company_id)->with('error', 'Failed to inactivate product.');

        }
    }

    public function searchByProductName($company_id){
        $company = Company::where('company_id', $company_id)->first();
        $products = Product::where('ref_company_id', $company_id)->where('product_name', 'like', '%'.request()->product_name.'%')->orderby('product_name')->get();

        return view('product.index', compact('company', 'products'));
    }

    public function searchByCategory($company_id){
        $company = Company::where('company_id', $company_id)->first();
        $products = Product::where('ref_company_id', $company_id)->where('ref_category_id', request()->ref_category_id)->orderby('product_name')->get();

        return view('product.index', compact('company', 'products'));
    }

    public function searchBySubcategory($company_id){
        $company = Company::where('company_id', $company_id)->first();
        $products = Product::where('ref_company_id', $company_id)->where('ref_parent_category_id', request()->ref_parent_category_id)->orderby('product_name')->get();
        return view('product.index', compact('company', 'products'));
    }

    public function searchByShopName($company_id){
        $company = Company::where('company_id', $company_id)->first();
        $products = Product::where('ref_company_id', $company_id)->where('ref_shop_id', request()->ref_shop_id)->orderby('product_name')->get();

        return view('product.index', compact('company', 'products'));
    }

    
}