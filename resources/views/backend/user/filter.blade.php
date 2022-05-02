<?php
    use Illuminate\Support\Facades\DB;

    if (isset($_REQUEST['item'])) {
        $_SESSION['filter_data'] = [];
        $data = $_REQUEST['item']; // array
    
        $filter_data = DB::table('user_detail')->where('status', $data['status'])
        ->orderBy('customerNumber', 'asc')->get();
        
        if (!empty($filter_data)) {
            foreach ($filter_data as $fd) {
                array_push($_SESSION['filter_data'], $fd);
            }
            echo true;
        } else  {
            echo false;
        }
    }