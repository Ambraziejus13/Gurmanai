<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdministrativeController extends Controller
{
    // Open the admin dashboard
    public function dashboard() {
        return view('admin.dashboard');
    }
    
    public function create() {
        return view('admin.create', ['users' => User::where('type', 'gourmet')->get()]);
    }

    // Create New Group
    public function store(Request $request) {
        $user = User::find($request['user_id']);

        $user -> update(['type' => 'administrator']);

        return redirect('/admin/dashboard')->with('message', 'Administratoriaus teisės sėkmingai suteiktos');
    }
}
