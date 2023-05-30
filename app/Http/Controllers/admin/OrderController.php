<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::orderBy('id','desc')->get();

        return view('admin-view.order.index', compact('orders'));
    }
}
