<?php
    
    if (isset($_REQUEST['method'])) {
        $_SESSION['carts'] = [];
        echo true;
    }