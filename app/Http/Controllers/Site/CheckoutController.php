<?php

namespace App\Http\Controllers\Site;

use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $orderContract;

    public function __construct(OrderContract $orderContract)
    {
        $this->orderContract = $orderContract;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
        $order = $this->orderContract->storeOrderDetails($request->all());

        dd($order);
    }
}
