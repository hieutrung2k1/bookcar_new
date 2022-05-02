<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookticketController extends Controller
{
    public function bookticket(Request $request) {
        return view('bookticket');
    }
}
