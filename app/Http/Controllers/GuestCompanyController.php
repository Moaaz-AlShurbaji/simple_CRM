<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class GuestCompanyController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }

    public function show()
    {
        $companies = Company::all();
        return view('guest.companies',\compact('companies'));
    }
}
