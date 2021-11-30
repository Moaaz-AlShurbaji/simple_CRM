<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
class CompanyController extends Controller
{
    public function index()
    {
            return view('admin.index');
    }
    
    public function show()
    {

        if(request('search'))
        {
            $item = \request('search');
            #dd(\request('search'));
            $companies = Company::where('name','LIKE','%'.$item.'%')->get();
        }
        else
        {
            $companies = Company::all();
        }
        
        return view('admin.companies',\compact('companies'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this -> validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required'
        ]);

        Company::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'website' => $request -> website
        ]);

        return redirect('/admin/companies') -> with('message','Company Added Successfuly');
    }

    public function edit($company_id)
    {
        $company = Company::FindorFail($company_id);
        return view('admin.edit', \compact('company'));
    }

    public function update($company_id, Request $request)
    {
        $company = Company::FindorFail($company_id);

        $this -> validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required'
        ]);

        
        $company -> update($request->all());

        return redirect('admin/companies') -> with('message', 'Company Details Updated Successfuly');
    }

    public function delete($company_id)
    {
        $company = Company::FindorFail($company_id);
        $company -> delete();
        return redirect('admin/companies');
    }

    public function company_employees($company_id)
    {
        $company = Company::FindorFail($company_id);
        $employees = $company->employees;
        return view('admin.company_employees',\compact('employees','company'));
    }

}
