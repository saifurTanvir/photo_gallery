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
        $success = Client::where('client_id', $client_id)->delete();

        if($success){
            return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
        }else{
            return redirect()->route('client.index')->with('error', 'Failed to delete client!!');

        }

    }

    public function make_active($client_id){
        $success = Client::where('client_id', $client_id)->update(['client_status' => 1]);

        if($success){
            return redirect()->route('client.index')->with('success', 'Client activated successfully.');
        }else{
            return redirect()->route('client.index')->with('error', 'Failed to activate client.');
        } 
    }

    public function make_inactive($client_id){
        $success = Client::where('client_id', $client_id)->update(['client_status' => 0]);

        if($success){
            return redirect()->route('client.index')->with('success', 'Client inactivated successfully.');
        }else{
            return redirect()->route('client.index')->with('error', 'Failed to inactivate client.');

        }
    }

    public function edit($client_id){
        $client = Client::where('client_id', $client_id)->first();
        return view('client.edit', compact('client'));
    }

    public function update($client_id){
        $success = Client::Where('client_id', $client_id)->update(request()->except(['_token']));

        if($success){
            return redirect()->route('client.index')->with('success', 'Client updated successfully.');
        }else{
            return redirect()->route('client.index')->with('error', 'Failed to update client!!');

        } 
    }
}
 