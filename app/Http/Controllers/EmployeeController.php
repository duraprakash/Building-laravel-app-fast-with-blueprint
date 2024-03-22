<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    public function test(Request $request): Response
    {
        $salary = $request->salary; // this line of code
        $name = $request->name; // this line of code
        $employees = Employee::where('salary', '>', $salary)->where('name','like', '%'. $name. '%')->orderBy('bonus')->limit(3)->get();
        dd($employees->toArray()); // this line of code with array
    }
}
