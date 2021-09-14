<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use DB; 
class ProductController extends Controller
{
    public function index(){
        $products = Product::orderby('product_name')->get();
        $categories = Category::get();
        $subcategories = Subcategory::get();
        return view('product.index', compact('products', 'categories', 'subcategories'));
    }

    public function create(){
        $categories = Category::get();
        $subcategories = Subcategory::get();
        return view('product.create', compact('categories', 'subcategories'));
    }

    public function store(Request $req){

        $data = array(
            "product_name" => request()->input('product_name'),
            "ref_category_id" => request()->input('ref_category_id'),
            "product_height" => request()->input('product_height'),
            "product_size" => request()->input('product_size'),
            "product_creation_date" => request()->input('product_creation_date'),
            "product_warranty" => request()->input('product_warranty'),
            "product_manufacture_place" => request()->input('product_manufacture_place'),
            "product_weight" => request()->input('product_weight'),
            "ref_subcategory_id" => request()->input('ref_subcategory_id'),
            "product_widht" => request()->input('product_widht'),
            "product_price" => request()->input('product_price'),
            "product_expaire_date" => request()->input('product_expaire_date'),
            "product_quality" => request()->input('product_quality'),
            "product_manufacturer_name" => request()->input('product_manufacturer_name'),
            "product_detail" => request()->input('product_detail'),
            "product_stock" => request()->input('product_stock')
        );
        
        $success = Product::create($data);
        $id = $success->id;
        if($success){

            $attach_files = $req->file('file');
        
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
                    'ref_product_id' => $id
                ];
                
                $insert = DB::table('attachment')->insert($attached);
            }
            return redirect()->route('product.index')->with('success', 'Product added successfully.');
        }else{
            return redirect()->route('product.index')->with('error', 'Failed to add product.');

        } 
    }

    public function show($product_id){
        $product = Product::where('product_id', $product_id)->first();
        $product_images = $product->productImage;
        $categories = Category::get();
        $subcategories = Subcategory::get();
        return view('product.show', compact('product', 'categories', 'subcategories', 'product_images'));
    }

    public function edit($product_id){
        $product = Product::where('product_id', $product_id)->first();
        $categories = Category::get();
        $subcategories = Subcategory::get();
        return view('product.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update($product_id){
        $success = Product::Where('product_id', $product_id)->update(request()->except(['_token']));

        if($success){
            return redirect()->route('product.index')->with('success', 'Product updated successfully.');
        }else{
            return redirect()->route('product.index')->with('error', 'Failed to update product.');

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
            return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
        }else{
            return redirect()->route('product.index')->with('error', 'Failed to delete product.');

        } 
    }

    public function make_active($product_id){
        $success = Product::where('product_id', $product_id)->update(['product_active' => 1]);

        if($success){
            return redirect()->route('product.index')->with('success', 'Product activated successfully.');
        }else{
            return redirect()->route('product.index')->with('error', 'Failed to activate product.');

        } 
    }

    public function make_inactive($product_id){
        $success = Product::where('product_id', $product_id)->update(['product_active' => 0]);

        if($success){
            return redirect()->route('product.index')->with('success', 'Product inactivated successfully.');
        }else{
            return redirect()->route('product.index')->with('error', 'Failed to inactivate product.');

        }
    }

    // public function combined_search(){
    //     $products = Product::where('product_name', 'like', '%'.request()->product_name.'%')->orWhere('ref', 'like', '%'.request()->product_name.'%')->get();
    //     $categories = Category::get();
    //     $subcategories = Subcategory::get();

    //     return view('product.index', compact('products', 'categories', 'subcategories'));
    // }

    public function searchByProductName(){
        $products = Product::where('product_name', 'like', '%'.request()->product_name.'%')->get();
        $categories = Category::get();
        $subcategories = Subcategory::get();

        return view('product.index', compact('products', 'categories', 'subcategories'));
    }

    public function searchByCategory(){
        $products = Product::where('ref_category_id', 'like', '%'.request()->ref_category_id.'%')->get();
        $categories = Category::get();
        $subcategories = Subcategory::get();
        
        return view('product.index', compact('products', 'categories', 'subcategories'));
    }

    public function searchBySubcategory(){
        $products = Product::where('ref_subcategory_id', 'like', '%'.request()->ref_subcategory_id.'%')->get();
        $categories = Category::get();
        $subcategories = Subcategory::get();
        
        return view('product.index', compact('products', 'categories', 'subcategories'));
    }

    public function searchByShopName(){
        dd(request()->all());
    }

    
}