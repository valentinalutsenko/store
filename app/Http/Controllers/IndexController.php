<?php

namespace App\Http\Controllers;

use App\Models\Category;

class IndexController extends Controller
{
    public function index()
    {
        return Category::find(1)->id;
    }
}
