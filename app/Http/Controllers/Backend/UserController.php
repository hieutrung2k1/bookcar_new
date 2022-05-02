<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        $user_detail = DB::table('user_detail')->get();
        $status = DB::table('user_detail')->distinct()->select('status')->get();
        return view('backend.user.index', [
            'user_detail' => $user_detail,
            'status' => $status
        ]);
    }

    public function show($id) {
        $user_detail = DB::table('user_detail')->get();

        return view('backend.user.show', [
            'id' => $id,
            'user_detail' => $user_detail
        ]);
    }
}
