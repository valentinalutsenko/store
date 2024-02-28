<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminProductService;
use Illuminate\Support\Collection;

class AdminProductController extends Controller
{
    public function __construct(private AdminProductService $productAdminService)
    {
        $this->productAdminService = $productAdminService;
    }

    public function store(): Collection
    {
        return $this->productAdminService->getAllProduct();
    }

}
