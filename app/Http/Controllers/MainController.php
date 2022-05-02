<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trip;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class MainController extends Controller
{
    public function viewMain(Request $request)
    {
        $garaDataFooter = DB::table('garage')->get();
        $ticketfavorite = DB::table('ticketfavorite')->get();

        return view('main', [
            'garaFooter' => $garaDataFooter, 
            'ticketFavorite' => $ticketfavorite
        ]);
    }

}
