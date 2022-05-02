<?php 

    if (isset($_REQUEST['item'])) {
        $item = $_REQUEST['item'];
        print_r($item);
        for ($i = 0; $i < sizeof($_SESSION['carts']); ++$i) {
            if ($_SESSION['carts'][$i] != null) {
                $_SESSION['carts'][$i] = null;
            }
        }
        array_push($_SESSION['carts'], $_REQUEST['item']);

        echo true;
    } 
