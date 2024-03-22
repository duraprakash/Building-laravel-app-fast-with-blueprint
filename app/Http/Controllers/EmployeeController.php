<?php

namespace App\Http\Controllers;

use App\Jobs\ComputeSalary;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    public function test(Request $request): Response
    {
        $employee = Employee::find($request->id);

        $computeSalary = ComputeSalary::dispatch($request->employee);

        dd($computeSalary);
    }
}
