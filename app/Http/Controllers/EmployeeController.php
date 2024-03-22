<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    public function test(Request $request): Response
    {
        $employee = Employee::find($request->id);

        return redirect()->route('employee.show', ["id"=>$employee->id]);
    }

    public function showEmployee(Request $request): Response
    {
        $employee = Employee::find($request->id);
        dd($employee->toArray());
    }
}
