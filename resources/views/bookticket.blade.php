<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

if (isset($_REQUEST['_method'])) {
    $carts = $_SESSION['carts'];
    $count_old_orders = DB::table('orders')->count();
    $count_old_payment = DB::table('payment')->count();

    foreach ($carts as $obj) {
        if ($obj != null) {
            $trip_id = (int)$obj['id'];
            $quantity = (int)$obj['quantity'];
            $price = (float)$obj['price'];

            
            $productCode = DB::table('trip')->where('trip_id', '=', $trip_id)->select('productCode')->get();
            // print_r($productCode[0]->productCode);

            DB::table('customer')->where('customerNumber', '=', $_SESSION['user_id'])
                ->update(['trip_id' => $trip_id]);
            if (empty(DB::table('orders')->where('customerNumber', $_SESSION['user_id'])->select('customerNumber')->get()[0])) {
                DB::table('orders')->insert([
                    'orderNumber' => $count_old_orders + 1,
                    'orderDate' => Carbon::today(),
                    'status' => 'Đã thanh toán',
                    'comment' => '',
                    'customerNumber' => $_SESSION['user_id']
                ]);
                DB::table('orderdetail')->insert([
                    'quantityOrder' => $quantity,
                    'price' => $price,
                    'orderNumber' => $count_old_orders + 1,
                    'productCode' => $productCode[0]->productCode
                ]);
                DB::table('payment')->insert([
                    'checkNumber' => strval($count_old_payment+1),
                    'paymentDate' => '',
                    'amount' => (int)(DB::table('orderdetail')->where('orderNumber', '=', $count_old_orders+1)->select('price')->get()[0]->price),
                    'customerNumber' => $_SESSION['user_id']
                ]);
            } else {
                DB::table('orders')
                ->where('customerNumber', $_SESSION['user_id'])
                ->update([
                    'orderDate' => Carbon::today(),
                    'status' => 'Đã thanh toán',
                    'comment' => ''
                ]);
                DB::table('orderdetail')
                ->where('orderNumber', DB::table('orders')->where('customerNumber', $_SESSION['user_id'])->select('orderNumber')->get()[0]->orderNumber)
                ->update([
                    'quantityOrder' => $quantity,
                    'price' => $price,
                    'productCode' => $productCode[0]->productCode
                ]);
                DB::table('payment')
                ->where('customerNumber', $_SESSION['user_id'])
                ->update([
                    'paymentDate' => '',
                    'amount' => DB::table('orderdetail')->where('orderNumber', '=', DB::table('orders')->where('customerNumber', $_SESSION['user_id'])->select('orderNumber')->get()[0]->orderNumber)->select('price')->get()[0]->price
                ]);
                echo 'trung';
                // DB::table('orders')->updateOrInsert(
                // [
                //     'customerNumber' => $_SESSION['user_id']
                // ],
                // [
                //     'orderDate' => Carbon::today(),
                //     'status' => 'Đã thanh toán',
                //     'comment' => ''
                // ]);
                // DB::table('orderdetail')->updateOrInsert(
                // [
                //     'orderNumber' => DB::table('orders')->where('customerNumber', $_SESSION['user_id'])->select('orderNumber')->get()[0]->orderNumber
                // ],
                // [
                //     'quantityOrder' => $quantity,
                //     'price' => $price,
                //     'productCode' => $productCode[0]->productCode
                // ]);
                // DB::table('payment')->updateOrInsert(
                // [
                //     'customerNumber' => $_SESSION['user_id']
                // ],
                // [
                //     'paymentDate' => '',
                //     'amount' => (int)(DB::table('orderdetail')->where('orderNumber', '=', $count_old_orders+1)->select('price')->get()[0]->price)
                // ]);
            }
        }
    }
}
