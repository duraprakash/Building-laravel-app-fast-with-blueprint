<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function test(Request $request)
    {
        $employee = Employee::find($request->id);

        return view('employee.show', compact('employee'));
    }
}
