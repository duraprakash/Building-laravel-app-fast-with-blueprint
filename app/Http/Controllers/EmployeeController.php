<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function test(Request $request)
    {
        $employee = Employee::find($request->id);

        return $employee;
    }
}
