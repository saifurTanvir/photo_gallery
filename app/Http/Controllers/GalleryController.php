<?php

namespace App\Http\Controllers;
use DB;

class GalleryController extends Controller
{
    public function index(){
        $galleries = DB::table('gallery')->get();
        return view('gallery.index', compact('galleries'));
    }


    public function allImages($gallery_id){
        $images = DB::table('image')->where('ref_gallery_id', $gallery_id)->get();
        return view('gallery.allImages', compact('images', 'gallery_id'));
    }

    public function create(){
        return view('gallery.create');
    }

    public function store(){
        request()->validate([
            'title' => 'required'
        ]);

        $data = array('gallery_title' => request()->title, 'gallery_description' => request()->description, 'gallery_created_date_time' => date("Y/m/d"));
        $success = DB::table('gallery')->insert($data);
        if($success){
            return redirect()->route('gallery.index')->with('success', 'Gallery created successfully.');
        }else{
            return redirect()->route('gallery.index')->with('error', 'Gallery creation failed.');
        }
    }

    public function store_image($gallery_id){
        request()->validate([
            'images.*' => 'image | mimes:jpeg,png,jpg'
        ]);

        foreach(request()->file('images') as $image){
            $attach_file_name = time().'_'.$image->getClientOriginalName();
            $upload_path = 'images/';
            $file_url = $upload_path. $attach_file_name;
            $success = $image->move($upload_path, $file_url);

            $data = array('image_description' => request()->description, 'ref_gallery_id' => $gallery_id, 'image_original_name' => $image->getClientOriginalName(), 'image_path' => $file_url, 'image_created_date_time' => date("Y/m/d"));
            $success = DB::table('image')->insert($data);
        }

        
        if($success){
            return back()->with('success', 'Image added to the gallery');
        }else{
            return back()->with('error', 'Fail to add upload image.');
        }
    }
}
