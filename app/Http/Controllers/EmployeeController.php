<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    public function test(Request $request): Response
    {
        $salary = $request->salary;
        $employees = Employee::where('salary','>', $salary)->orderBy('bonus')->get();
        dd($employees);
    }
}
