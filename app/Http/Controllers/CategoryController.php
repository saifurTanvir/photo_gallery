<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;

class CategoryController extends Controller
{
    public function index($company_id){
        $categories = Category::where('ref_company_id', $company_id)->get();
        return view('category.index', compact('categories', 'company_id')); 
    }

    public function create($company_id){
        $categories = Category::where('ref_company_id', $company_id)->get();
        $companies = Company::where('company_id', $company_id)->get();

        return view('category.create', compact('categories', 'companies', 'company_id'));
    }

    public function store($company_id){
        $data = request()->all();
        $data['category_created_at'] = date("Y-m-d H:i:s");
        $success = Category::create($data);

        if($success){
            return redirect()->route('category.index', $company_id)->with('success', 'Category added successfully.');
        }else{
            return redirect()->route('category.index', $company_id)->with('error', 'Failed to add category.');
        }
    }

    public function edit($company_id, $category_id){
        $categories = Category::where('ref_company_id', $company_id)->get();
        $companies = Company::where('company_id', $company_id)->get();
        $self = Category::where('category_id', $category_id)->first();

        return view('category.edit', compact('categories', 'companies', 'self', 'company_id'));
    }

    public function update($company_id, $category_id){
        $data = request()->except(['_token']);
        $data['category_updated_at'] = date("Y-m-d H:i:s");
        $success = Category::Where('category_id', $category_id)->update($data);

        if($success){
            return redirect()->route('category.index', $company_id)->with('success', 'Category updated successfully.');
        }else{
            return redirect()->route('category.index', $company_id)->with('error', 'Failed to update category!!');

        } 
    }

    public function delete($company_id, $category_id){
        $success = Category::where('category_id', $category_id)->delete();

        if($success){
            return redirect()->route('category.index', $company_id)->with('success', 'Category deleted successfully.');
        }else{
            return redirect()->route('category.index', $company_id)->with('error', 'Failed to delete category!!');

        }

    }

    public function make_active($company_id, $category_id){
        $success = Category::where('category_id', $category_id)->update(['category_active' => 1]);

        if($success){
            return redirect()->route('category.index', $company_id)->with('success', 'Category activated successfully.');
        }else{
            return redirect()->route('category.index', $company_id)->with('error', 'Failed to activate category.');
        } 
    }

    public function make_inactive($company_id, $category_id){
        $success = Category::where('category_id', $category_id)->update(['category_active' => 0]);

        if($success){
            return redirect()->route('category.index', $company_id)->with('success', 'Category inactivated successfully.');
        }else{
            return redirect()->route('category.index', $company_id)->with('error', 'Failed to inactivate category.');

        }
    }

}
 