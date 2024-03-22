<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    public function test(Request $request): Response
    {
        $employee = Employee::find($request->id);
        $employee->name="Mark"; // changed name to Mark
        $employee->save();

        // showing the changed data
        $employee1 = Employee::find($request->id);
        dd($employee1->toArray());
    }
}
