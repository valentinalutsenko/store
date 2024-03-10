<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminOrderService;
use Illuminate\Database\Eloquent\Collection;

class AdminOrderShowController extends Controller
{
    public function __construct(private AdminOrderService $adminOrderService)
    {
        $this->adminOrderService = $adminOrderService;
    }
    public function show(): Collection
    {
        return $this->adminOrderService->showOrder();

    }
}
