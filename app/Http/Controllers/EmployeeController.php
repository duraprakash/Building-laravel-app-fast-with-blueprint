<?php

namespace App\Http\Controllers;

use App\Mail\ThanksMail;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function test(Request $request): Response
    {
        $employee = Employee::find($id);

        Mail::to($employee->contactInfo->email)->send(new ThanksMail());
    }
}
