<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json('Hello Admin!');
    }
}
