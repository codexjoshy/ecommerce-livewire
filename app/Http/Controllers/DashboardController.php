<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Home(Request $request)
    {
        $user = Auth::user();
    }

    public function Dashboard()
    {

        return view('admin.home');
    }
}
