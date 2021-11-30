<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
class GuestEmployeeController extends Controller
{
    public function show()
    {
        $employees = Employee::all();
        return view('guest.employees',compact('employees'));
    }
}
