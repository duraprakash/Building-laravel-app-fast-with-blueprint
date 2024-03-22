<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeTestRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    public function test(EmployeeTestRequest $request): Response
    {
        
    }
}
