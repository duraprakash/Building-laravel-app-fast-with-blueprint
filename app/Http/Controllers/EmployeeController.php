<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeCollection;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function test(Request $request): Response
    {
        $employee = Employee::find($request->id);

        return new EmployeeCollection($employee);
    }
}
