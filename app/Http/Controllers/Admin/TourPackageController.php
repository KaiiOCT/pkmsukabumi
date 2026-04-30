<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TourPackageController extends Controller
{
    public function index()
    {
        return view('admin.packages.index');
    }

    public function create()
    {
        return view('admin.packages.create');
    }
    public function edit($id)
    {
        return view('admin.packages.edit');
    }
}