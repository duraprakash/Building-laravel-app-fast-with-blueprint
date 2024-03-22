<?php

namespace App\Http\Controllers;

use App\Events\FancyEvent;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Notifications;

class EmployeeController extends Controller
{
    public function test(Request $request): Response
    {
        $project = Project::find($request->id);
        $employee = Employee::find(5);

        FancyEvent::dispatch($employee);

        $request->session()->flash('employee.name', $employee->name);

        $employee->notify(new checkDetails($project));
    }
}
