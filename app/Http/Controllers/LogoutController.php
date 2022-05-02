<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout() {
        $garaDataFooter = DB::table('garage')->get();
        $ticketfavorite = DB::table('ticketfavorite')->get();

        $_SESSION['email'] = '';
        $_SESSION['user_id'] = '';
        $_SESSION['carts'] = '';
        // session_destroy();

        return view('main', [
            'garaFooter' => $garaDataFooter, 
            'ticketFavorite' => $ticketfavorite
        ]);
    }
}
