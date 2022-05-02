<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $garaDataFooter = DB::table('garage')->get();
        $ticketfavorite = DB::table('ticketfavorite')->get();

        $login_info = $request->all();
        // $_SESSION['email'] = trim($login_info['email_login']);
        if (strcmp($_SESSION['email'], 'admin@gmail.com') == 0 && strcmp($login_info['password_login'], 'admin') == 0) {
            return view('backend.homepage', [
                'garaFooter' => $garaDataFooter,
                'ticketFavorite' => $ticketfavorite
            ]);
        }
        if ($_SESSION['email'] == '') {
            if (!empty($login_info)) {
                $_SESSION['email'] = trim($login_info['email_login']);
                if (strcmp($_SESSION['email'], 'admin@gmail.com') == 0 && strcmp($login_info['password_login'], 'admin') == 0) {
                    return view('backend.homepage', [
                        'garaFooter' => $garaDataFooter,
                        'ticketFavorite' => $ticketfavorite
                    ]);
                }
                $tb_customer = DB::table('customer')->get();
                foreach ($tb_customer as $user) {
                    if (strcmp($user->email, $login_info['email_login']) == 0 && strcmp($user->password, $login_info['password_login']) == 0) {
                        $_SESSION['user_id'] = $user->customerNumber;
                        $_SESSION['email'] = trim($login_info['email_login']);
                    }
                }
            }
        }

        return view('main', [
            'garaFooter' => $garaDataFooter,
            'ticketFavorite' => $ticketfavorite
        ]);
    }
}
