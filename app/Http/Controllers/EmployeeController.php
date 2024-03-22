<?php

namespace App\Http\Controllers;

use App\Events\FancyEvent;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    public function test(Request $request): Response
    {
        $employee = Employee::find($id);

        FancyEvent::dispatch($employee);

        $request->session()->flash('employee.name', $employee->name);
    }
}
