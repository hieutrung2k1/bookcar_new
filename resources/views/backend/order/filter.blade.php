<?php
    use Illuminate\Support\Facades\DB;

    if (isset($_REQUEST['item'])) {
        $_SESSION['filter_data'] = [];
        $data = $_REQUEST['item']; // array
    
        $filter_data = DB::table('order_detail')->where('status', $data['status'])
        ->orderBy('orderNumber', 'asc')->get();
        
        foreach ($filter_data as $fd) {
            array_push($_SESSION['filter_data'], $fd);
        }
        echo true;
    }