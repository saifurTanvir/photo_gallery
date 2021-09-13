<?php

namespace App\Http\Controllers;
use App\Models\Client;
use DB;

use Illuminate\Http\Request;
 
class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    public function create(){
        return view('client.create');
    }

    public function store(){
        $success = Client::create(request()->all());

        if($success){
            return redirect()->route('client.index')->with('success', 'Client added successfully.');
        }else{
            return redirect()->route('client.index')->with('error', 'Failed to add client.');

        }
    }

    public function delete($client_id){
        $success = Client::where('client_id', 1)
      ->update(['client_status' => 0]);

      if($success){
            return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
        }else{
            return redirect()->route('client.index')->with('error', 'Failed to delete client');

        }

    }
}
