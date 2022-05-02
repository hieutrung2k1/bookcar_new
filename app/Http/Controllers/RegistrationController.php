<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {

        $garaDataFooter = DB::table('garage')->get();
        $ticketfavorite = DB::table('ticketfavorite')->get();
        $register_info = $request->all();
        if ($_SESSION['email'] == '') {
            if (!empty($register_info)) {
                $tb_customer = DB::table('customer')->get();
                $ok = false;
                foreach ($tb_customer as $user) {
                    if (strcmp($user->email, $register_info['email']) == 0) {
                        $ok = true;
                    }
                }
                $count_old_records = DB::table('customer')->count('*');
                if ($ok == false) {
                    $_SESSION['email'] = trim($register_info['email']);
                    $_SESSION['user_id'] = $count_old_records + 1;
                    DB::table('customer')->insert([
                        'customerNumber' => $count_old_records + 1,
                        'email' => trim($register_info['email']),
                        'password' => trim($register_info['password'])
                    ]);
                }
            }
        }

        return view('main', [
            'garaFooter' => $garaDataFooter,
            'ticketFavorite' => $ticketfavorite,
            'register_info' => $register_info
        ]);
    }
}
