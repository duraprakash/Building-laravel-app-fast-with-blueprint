<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function test(Request $request): Response
    {
        $employee = Employee::find($requset->id);

        return new EmployeeResource($employee);
    }
}
