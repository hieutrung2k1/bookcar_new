<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile(Request $request) {
        // dd($request->all());
        $garaDataFooter = DB::table('garage')->get();
        $ticketfavorite = DB::table('ticketfavorite')->get();

        $profile = $request->all();

        DB::table('customer')->where('customerNumber', $_SESSION['user_id'])
        ->update([
            'customerName' => $profile['nameAccount'],
            'dob' => $profile['dobAccount'],
            'sex' => $profile['sexAccount'],
            'phone' => $profile['phoneAccount'],
            'address' => $profile['addressAccount']
        ]);

        echo '<script>alert("Cập nhật thành công!")</script>';

        return view('main', [
            'garaFooter' => $garaDataFooter, 
            'ticketFavorite' => $ticketfavorite
        ]);
    }
}
