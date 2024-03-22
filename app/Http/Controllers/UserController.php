<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $roles = Role::latest()->get();
        // $users = User::with('role')->latest()->get();
        return view('admin.user.index');
    }
    public function create()
    {

        return view('admin.user.create');
    }
}
