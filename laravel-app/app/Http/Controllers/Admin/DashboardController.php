<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;

class DashboardController extends Controller
{
    
    public function Index() {
        return view('admin.dashboard');
    }

    // BAD FUCKING PRACTICE DONT HARDCORE ROUTES NIGGA 
    public function AdminLogout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('http://localhost:9000/public/login/');
    }


}
