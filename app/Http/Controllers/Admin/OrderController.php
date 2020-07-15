<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends BaseController
{ 
    protected $orderContract;

    public function __construct(OrderContract $orderContract)
    {
        $this->orderContract = $orderContract;
    }
    public function index()
    {
        $orders = $this->orderContract->listOrders();
        $this->setPageTitle('Orders', 'List of all orders');
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderContract->findOrderByNumber($orderNumber);

        $this->setPageTitle('Order Details', $orderNumber);
        return view('admin.orders.show', compact('order'));

    }
}