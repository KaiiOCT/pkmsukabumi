<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function index()
    {
        return view('admin.attractions.index');
    }
    public function create()
    {
        return view('admin.attractions.create');
    }
    public function edit($id)
    {
        return view('admin.attractions.edit');
    }
}
