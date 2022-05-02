<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        $ticket_detail = DB::table('ticket_detail')->get();
        $departure = DB::table('tripdetail')->distinct()->select('departure')->get();
        $destination = DB::table('tripdetail')->distinct()->select('destination')->get();

        return view('backend.product.index', [
            'ticket_detail' => $ticket_detail,
            'departure' => $departure,
            'destination' => $destination
        ]);
    }

    public function show($id) {
        $ticket_detail = DB::table('ticket_detail')->get();

        return view('backend.product.show', [
            'id' => $id,
            'ticket_detail' => $ticket_detail
        ]);
    }

    public function edit() {
        return view('backend.product.edit');
    }
}
