<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductAdminService;

class AdminProductController extends Controller
{
    public function __construct(private ProductAdminService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }

    public function store()
    {

    }

}
