<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacture;

class CompanyController extends Controller
{
    public function index()
    {
        return view('admin.pages.companies.index');
    }  
    public function view($id)
    {
        return view('admin.pages.companies.view',compact('id'));
    }    
}
