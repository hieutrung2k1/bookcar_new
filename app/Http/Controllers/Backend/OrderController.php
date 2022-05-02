<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        $order_detail = DB::table('order_detail')->get();
        $status = DB::table('order_detail')->distinct()->select('status')->get();


        return view('backend.order.index', [
            'order_detail' => $order_detail,
            'status' => $status
        ]);
    }

    public function show($id) {
        $order_detail = DB::table('order_detail')->get();

        return view('backend.order.show', [
            'id' => $id,
            'order_detail' => $order_detail
        ]);
    }
}
