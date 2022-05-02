<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index() {
        $employees = DB::table('employee_detail')
                    ->distinct()
                    ->select('employeeNumber', 'employeeName', 'sex', 'phoneNumber', 'gara_id')
                    ->orderBy('employeeNumber','asc')
                    ->get();
        $employee_detail = DB::table('employee_detail')->get();

        return view('backend.employee.index', [
            'employees' => $employees,
            'employee_detail' => $employee_detail
        ]);
    }

    public function show($id) {
        $employee_detail = DB::table('employee_detail')->distinct()
        ->select('employeeNumber', 'employeeName', 'gara_id', 'phone', 'garageDescription', 'phoneNumber')->orderBy('employeeNumber', 'asc')->get();

        return view('backend.employee.show', [
            'id' => $id, 
            'employee_detail' => $employee_detail
        ]);
    }

    public function delete($id) {

        return view('backend.employee.delete', [
            'id' => $id
        ]);
    }

    public function create(Request $request) {

        return view('backend.employee.create');
    }
}
