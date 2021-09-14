<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index', compact('categories')); 
    }

    public function create(){
        $categories = Category::all();
        $companies = Company::all();

        return view('category.create', compact('categories', 'companies'));
    }

    public function store(){
        $data = request()->all();
        $data['category_created_at'] = date("Y-m-d H:i:s");
        $success = Category::create($data);

        if($success){
            return redirect()->route('category.index')->with('success', 'Category added successfully.');
        }else{
            return redirect()->route('category.index')->with('error', 'Failed to add category.');
        }
    }

    public function edit($category_id){
        $categories = Category::all();
        $companies = Company::all();
        $self = Category::where('category_id', $category_id)->first();

        return view('category.edit', compact('categories', 'companies', 'self'));
    }

    public function update($category_id){

        $data = request()->except(['_token']);
        $data['category_updated_at'] = date("Y-m-d H:i:s");
        $success = Category::Where('category_id', $category_id)->update($data);

        if($success){
            return redirect()->route('category.index')->with('success', 'Category updated successfully.');
        }else{
            return redirect()->route('category.index')->with('error', 'Failed to update category!!');

        } 
    }

    public function delete($category_id){
        $success = Category::where('category_id', $category_id)->delete();

        if($success){
            return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
        }else{
            return redirect()->route('category.index')->with('error', 'Failed to delete category!!');

        }

    }

    public function make_active($category_id){
        $success = Category::where('category_id', $category_id)->update(['category_active' => 1]);

        if($success){
            return redirect()->route('category.index')->with('success', 'Category activated successfully.');
        }else{
            return redirect()->route('category.index')->with('error', 'Failed to activate category.');
        } 
    }

    public function make_inactive($category_id){
        $success = Category::where('category_id', $category_id)->update(['category_active' => 0]);

        if($success){
            return redirect()->route('category.index')->with('success', 'Category inactivated successfully.');
        }else{
            return redirect()->route('category.index')->with('error', 'Failed to inactivate category.');

        }
    }

}
 