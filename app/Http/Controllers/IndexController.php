<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;



class IndexController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json('Hello User!');
    }
}
