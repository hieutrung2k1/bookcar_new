<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function carts() {
        $carts = $_SESSION['carts'];
        $tb_trip = DB::table('trip')->get();

        return view('listcarts', [
            'carts' => $carts,
            'tb_trip' => $tb_trip
        ]);
    }
}
