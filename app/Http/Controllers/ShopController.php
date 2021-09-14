<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Company;

class ShopController extends Controller
{
    public function index(){
        $shops = Shop::all();
        return view('shop.index', compact('shops'));
    }

    public function create(){
        $categories = Category::all();
        $companies = Company::all();

        return view('shop.create', compact('categories', 'companies'));
    }

    public function store(){
        $data = request()->all();
        $data['shop_created_at'] = date("Y-m-d H:i:s");
        $success = Shop::create($data);

        if($success){
            return redirect()->route('shop.index')->with('success', 'Shop added successfully.');
        }else{
            return redirect()->route('shop.index')->with('error', 'Failed to add shop.');
        }
    }

    public function edit($shop_id){
        $categories = Category::all();
        $companies = Company::all();

        $shop = Shop::where('shop_id', $shop_id)->first();

        return view('shop.edit', compact('categories', 'companies', 'shop'));
    }

    public function update($shop_id){

        $data = request()->except(['_token']);
        $data['shop_updated_at'] = date("Y-m-d H:i:s");
        $success = Shop::Where('shop_id', $shop_id)->update($data);

        if($success){
            return redirect()->route('shop.index')->with('success', 'Shop updated successfully.');
        }else{
            return redirect()->route('shop.index')->with('error', 'Failed to update shop!!');

        } 
    }

    public function delete($shop_id){
        $success = Shop::where('shop_id', $shop_id)->delete();

        if($success){
            return redirect()->route('shop.index')->with('success', 'Shop deleted successfully.'); 
        }else{
            return redirect()->route('shop.index')->with('error', 'Failed to delete shop!!');

        }

    }

    public function make_active($shop_id){
        $success = Shop::where('shop_id', $shop_id)->update(['shop_active' => 1]);

        if($success){
            return redirect()->route('shop.index')->with('success', 'Shop activated successfully.');
        }else{
            return redirect()->route('shop.index')->with('error', 'Failed to activate shop.');
        } 
    }

    public function make_inactive($shop_id){
        $success = Shop::where('shop_id', $shop_id)->update(['shop_active' => 0]);

        if($success){
            return redirect()->route('shop.index')->with('success', 'Shop inactivated successfully.');
        }else{
            return redirect()->route('shop.index')->with('error', 'Failed to inactivate shop.');

        }
    }
}
 