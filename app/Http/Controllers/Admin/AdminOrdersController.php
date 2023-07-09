<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order_status;
use App\Models\Orders;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    public function showOrders()
    {
        return view('admin.page.orders', ['orders' => Orders::all(), 'statuses' => Order_status::all()]);
    }
    public function changeStatus(Request $request)
    {
        Orders::where('id',$request->order_id)->update([
            'status_id' => $request->status_id
        ]);
    }
}
