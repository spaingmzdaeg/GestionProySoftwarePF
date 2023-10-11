<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function Index() {
        $providers = Provider::latest()->get();
        return view('admin.allproviders', compact('providers'));
    }

    public function AddProvider() {
        return view('admin.addprovider');
    }

    public function StoreProvider(Request $request) {
        $request->validate([
            'provider_name' => 'required'
        ]);

        Provider::insert([
            'provider_name' => $request->provider_name,
            'slug' => strtolower(str_replace(' ','-', $request->provider_name))
        ]);

        return redirect()->route('allproviders')->with('message', 'Provider Added Succesfully.');

    }

    public function EditProvider($id){
        $provider_info = Provider::findOrFail($id);
        return view('admin.editprovider', compact('provider_info'));
    }

    public function UpdateProvider(Request $request) {
        $provider_id = $request->provider_id;

        $request->validate([
            'provider_name' => 'required'
        ]);

        Provider::findOrFail($provider_id)->update([
            'provider_name' => $request->provider_name,
            'slug' => strtolower(str_replace(' ','-', $request->provider_name))
        ]);

        return redirect()->route('allproviders')->with('message', 'Provider Updated Succesfully.');

    }

    public function DeleteProvider($id) {
        Provider::findOrFail($id)->delete();
        return redirect()->route('allproviders')->with('message', 'Provider Deleted Succesfully.');
    }

}

