<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
class EmployeeController extends Controller
{
    public function index()
    {
        if(request('search'))
        {
            $item = \request('search');
            #dd(\request('search'));
            $employees = Employee::where('first_name','LIKE','%'.$item.'%')->orWhere('last_name','LIKE','%'.$item.'%')->get();
        }
        else
        {
            $employees = Employee::with('company')->get();
        }
        
        return view('admin.employees',compact('employees'));
    }

    public function create($company_id)
    {
        $company = Company::FindorFail($company_id);
        return view('admin.create_employee',compact('company'));
    }

    public function store(Request $request, $company_id)
    {
        //$company = Company::FindorFail($company_id);

        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email'
        ]);

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $company_id,
            'email' => $request->email
        ]);

        return redirect('/admin/companies') -> with('message','Employee Added Successfuly');
    }

    public function edit($employee_id, $company_id)
    {
        $company = Company::FindorFail($company_id);
        $employee = Employee::FindorFail($employee_id);
        return view('admin.edit_employee',\compact('company','employee'));
    }

    public function update(Request $request, $employee_id)
    {
        $employee = Employee::FindorFail($employee_id);

        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email'
        ]);

        $employee->update($request->all());
        return redirect() -> back() -> with('message', 'Employee Details Updated Successfuly');
    }

    public function delete($employee_id)
    {
        $employee = Employee::FindorFail($employee_id);
        $employee->delete();
        return redirect()->back();
    }
}
