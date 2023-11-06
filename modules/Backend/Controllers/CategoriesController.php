<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
        return view('categories.index');
    }
}