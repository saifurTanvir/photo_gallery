<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Category;
use App\Models\Company;

class ShopController extends Controller
{
    public function index($company_id){
        $shops = Shop::where('ref_company_id', $company_id)->get();
        return view('shop.index', compact('shops', 'company_id'));
    }

    public function create($company_id){
        $categories = Category::where('ref_company_id', $company_id)->get();
        $companies = Company::where('company_id', $company_id)->get();

        return view('shop.create', compact('categories', 'companies', 'company_id'));
    }

    public function store($company_id){
        $data = request()->all();
        $data['shop_created_at'] = date("Y-m-d H:i:s");
        $success = Shop::create($data);

        if($success){
            return redirect()->route('shop.index', $company_id)->with('success', 'Shop added successfully.');
        }else{
            return redirect()->route('shop.index', $company_id)->with('error', 'Failed to add shop.');
        }
    }

    public function edit($company_id, $shop_id){
        $categories = Category::where('ref_company_id', $company_id)->get();
        $companies = Company::where('company_id', $company_id)->get();

        $shop = Shop::where('shop_id', $shop_id)->where('ref_company_id', $company_id)->first();

        return view('shop.edit', compact('categories', 'companies', 'shop', 'company_id'));
    }

    public function update($company_id, $shop_id){

        $data = request()->except(['_token']);
        $data['shop_updated_at'] = date("Y-m-d H:i:s");
        $success = Shop::Where('shop_id', $shop_id)->update($data);

        if($success){
            return redirect()->route('shop.index', $company_id)->with('success', 'Shop updated successfully.');
        }else{
            return redirect()->route('shop.index', $company_id)->with('error', 'Failed to update shop!!');

        } 
    }

    public function delete($company_id, $shop_id){
        $success = Shop::where('shop_id', $shop_id)->delete();

        if($success){
            return redirect()->route('shop.index', $company_id)->with('success', 'Shop deleted successfully.'); 
        }else{
            return redirect()->route('shop.index', $company_id)->with('error', 'Failed to delete shop!!');

        }

    }

    public function make_active($company_id, $shop_id){
        $success = Shop::where('shop_id', $shop_id)->update(['shop_active' => 1]);

        if($success){
            return redirect()->route('shop.index', $company_id)->with('success', 'Shop activated successfully.');
        }else{
            return redirect()->route('shop.index', $company_id)->with('error', 'Failed to activate shop.');
        } 
    }

    public function make_inactive($company_id, $shop_id){
        $success = Shop::where('shop_id', $shop_id)->update(['shop_active' => 0]);

        if($success){
            return redirect()->route('shop.index', $company_id)->with('success', 'Shop inactivated successfully.');
        }else{
            return redirect()->route('shop.index', $company_id)->with('error', 'Failed to inactivate shop.');

        }
    }
}
 