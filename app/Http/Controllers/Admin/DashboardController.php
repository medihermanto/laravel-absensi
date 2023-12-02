<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        toastr()->success('Selamat datang, ' . Auth::user()->name);
        return view('admin.dashboard.index')->with('notification');
    }
}
