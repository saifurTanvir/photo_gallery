<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;

class ShopManageController extends Controller
{
    public function index($shop_id){
        
        $shop = Shop::where('shop_id', $shop_id)->first();
        $products = Product::where('ref_shop_id', $shop_id)->get();

        return view('shopManage.index', compact('shop', 'products'));
    }

    public function product($shop_id){
        $shop = Shop::where('shop_id', $shop_id)->first();
        $products = Product::where('ref_shop_id', $shop_id)->get();

        return view('shopManage.products', compact('shop', 'products'));
    }

    public function search_product($shop_id){
        $shop = Shop::where('shop_id', $shop_id)->first();
        $products = Product::where('product_name', 'like', '%'.request()->input('product_name').'%'  )->where('ref_shop_id', $shop->shop_id)->get();

        return view('shopManage.products', compact('shop', 'products'));
    }

    public function product_list_by_category($shop_id, $category_id){
        $shop = Shop::where('shop_id', $shop_id)->first();
        $products = Product::where('ref_category_id', $category_id)->where('ref_shop_id', $shop->shop_id)->get();

        return view('shopManage.products', compact('shop', 'products'));
    }

    public function show($shop_id, $product_id){
        $shop = Shop::where('shop_id', $shop_id)->first();
        $product = Product::where('product_id', $product_id)->first();

        return view('shopManage.show', compact('shop', 'product'));
    }

    public function edit($shop_id, $product_id){
        $shop = Shop::where('shop_id', $shop_id)->first();
        $product = Product::where('product_id', $product_id)->first();

        return view('shopManage.edit', compact('shop', 'product'));
    }

    public function update($shop_id, $product_id){
        $success = Product::where('product_id', $product_id)->update(request()->all()->except('_token'));

        if($success){
            return redirect()->route('shop.manage.product.show', [$shop_id, $product_id])-with('success', 'Product updated successfully.');
        }else{
            return redirect()->route('shop.manage.product.show', [$shop_id, $product_id])-with('error', 'Fails to update product!!');
        }

    }

    public function delete($shop_id, $product_id){
        $success = Product::where('product_id', $product_id)->delete();
        
        if($success){
            return redirect()->route('shop.manage.product.show', [$shop_id, $product_id])-with('success', 'Product deleted successfully.');
        }else{
            return redirect()->route('shop.manage.product.show', [$shop_id, $product_id])-with('error', 'Fails to delete product!!');
        }
    }

    public function sale($shop_id, $product_id){
        $shop = Shop::where('shop_id', $shop_id)->first();
        $product = Product::where('product_id', $product_id)->first();

        return view('shopManage.sale', compact('shop', 'product'));
    }

    public function sale_confirm($shop_id, $product_id){
        $stock = Product::where('product_id', $product_id)->pluck('product_stock')->first();
        if($stock - request()->input('product_stock') < 0){
            return redirect()->route('shop.manage.product.sale', [$shop_id, $product_id])->with("error", "Stock limit, please take less items.");
        }else{
            $stock = $stock - request()->input('product_quantity');
            $product = Product::where('product_id', $product_id)->update(['product_stock'=> $stock]);
            
            return redirect()->route('shop.manage.product.sale', [$shop_id, $product_id])->with("success", "Sale successful, please collect print.");
        }
        
    }


}
